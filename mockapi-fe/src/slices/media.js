import {createSlice,} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient, resfulClient,} from "services";
import _slice_common from "./_slice_common";
import {setRallydataMerge} from "./rallydatas";
import {setCommonMerge} from "./commons";

export const initialState = {
    cMedium: {isOpen: false},
    adMedium: {},
    dMedium: {},
    eMedium: {},
    epMedium: {isOpen: false},
    duMedium: {},
    mlMedia: {isRefresh: false, search: {name: ``}},
    mMedia: {},
    cbMedia: {},
    pMedia: {files: []},
    uMedia: [],
};

const mediaSlice = createSlice({
    name: "media",
    initialState,
    reducers: {
        setData: (state, {payload}) => {
            state = _slice_common.setData(initialState, state, payload);
        },
        setMerge: (state, {payload}) => {
            state = _slice_common.setMerge(initialState, state, payload);
        },
    },
});


export const {setData, setMerge} = mediaSlice.actions
export const mediaSelector = (state) => state.media
export default mediaSlice.reducer

export function setMedia(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    }
}

export function setMediaMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function askDeleteMedia(mediaIds) {
    return async (dispatch) => {
        dispatch(setData({adMedium: {isLoading: true,}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($ids: [ID]!) {
  ask_delete_media(
    input: {
      ids: $ids
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: {ids: mediaIds}
            });
        }
        try {
            await mutationAPI().then(res => {
                const ask_delete_media = res?.data?.ask_delete_media
                dispatch(setData({adMedium: ask_delete_media}))
                dispatch(setMerge({mlMedia: {isRefresh: ask_delete_media?.status}}))
                dispatch(setRallydataMerge('mlDRRallydata', {isRefresh: ask_delete_media?.status}))
            })
        } catch (e) {
            dispatch(setMerge({adMedium: {isLoading: false}}))
        }
    }
}

export function deleteMedia(mediaIds) {
    return async (dispatch) => {
        dispatch(setData({dMedium: {isLoading: true,}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($ids: [ID]!) {
  delete_media(
    input: {
      ids: $ids
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: {ids: mediaIds}
            });
        }
        try {
            await mutationAPI().then(res => {
                const delete_media = res?.data?.delete_media
                dispatch(setData({dMedium: delete_media, adMedium: {}}))
                dispatch(setMerge({mlMedia: {isRefresh: delete_media}}))
                dispatch(setRallydataMerge('mlDRRallydata', {isRefresh: delete_media}))
            })
        } catch (e) {
            dispatch(setMerge({dMedium: {isLoading: false}}))
        }
    }
}

export function myMediaList(dataset_id) {
    console.log('myMediaList dataset_id', dataset_id)
    return async (dispatch, getState) => {
        const {mlMedia} = getState().media
        if (mlMedia.isLoading) return;
        dispatch(setMerge({mlMedia: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query($name:String, $dataset_id:ID) {
  my_media_list(
      name:$name
      dataset_id:$dataset_id
  ){
    id
    file_type
    file
    thumb
    name_upload
    updated_at
  }
}`;
        const res = await apolloClient.query({
            query,
            variables: {dataset_id}
        })
        const myMediaList = res?.data?.my_media_list ?? []
        dispatch(setMerge({
            mlMedia:
                {
                    isLoading: false,
                    data: myMediaList,
                    isRefresh: false,
                    search: {...mlMedia.search, total: myMediaList.length},
                }
        }))
    }
}

export function uploadMediaPaste(name) {
    return async (dispatch, getState) => {
        dispatch(setMerge({pMedia: {isLoading: true}}))
        const {pMedia,} = getState().media
        const {dataset_id_RD,} = getState().rallydatas
        const {checkedList} = getState().commons

        let promises = [];
        // pMedia.files.map((file) => {
        //     const formData = new FormData()
        //     formData.append('file', file)
        //     formData.append('dataset_id', dataset_id_RD)
        //     formData.append('source', 'ant-upload')
        //     promises.push(resfulClient.post('/api/media', formData))
        // })
        // async function url2blob(url) {
        //     try {
        //         const data = await fetch(url);
        //         const blob = await data.blob();
        //         await navigator.clipboard.write([
        //             new ClipboardItem({
        //                 [blob.type]: blob
        //             })
        //         ]);
        //         console.log("Success.");
        //     } catch (err) {
        //         console.error(err.name, err.message);
        //     }
        // }
        const getFormDataSync = (fileURL) => {
            return new Promise((resolve, reject) => {
                const formData = new FormData()
                formData.append('dataset_id', dataset_id_RD)
                formData.append('source', 'ant-upload')
                fetch(fileURL).then(res=>{
                    res.blob().then(blob=>{
                        formData.append('file', blob)
                        resolve(resfulClient.postSync('/api/media', formData))
                        // resolve(formData)
                    })
                })
                // fData.blob()
            })
        }

        // const p = await pMedia.files.map(async (file) => {
        //     // const formData = new FormData()
        //     // const fData = await fetch(file)
        //     // const blob = await fData.blob()
        //     // formData.append('file', blob)
        //     // formData.append('dataset_id', dataset_id_RD)
        //     // formData.append('source', 'ant-upload')
        //     // console.log('formData', formData)
        //     // return resfulClient.postSync('/api/media', formData)
        // })
        promises.push(getFormDataSync(pMedia.files[0]))

        console.log('promises', promises)
        Promise.all(promises).then(values => {
            console.log('values', values)
            let cl = checkedList[name] ? JSON.parse(JSON.stringify(checkedList[name])) : []
            console.log('cl', cl)
            // (values ?? []).forEach(res => {
            //     cl = [...cl, res?.data?.id.toString()]
            // });
            values.map((res) => {
                cl = [...cl, res?.data?.id.toString()]
            })
            dispatch(setCommonMerge('checkedList', {[name]: cl}))
            console.log('2')
            dispatch(setMerge({
                pMedia: {files: [], isLoading: false},
                mlMedia: {isRefresh: true}
            }))
        })
    }
}

export function uploadFile(formData) {
    return async (dispatch, getState) => {
        dispatch(setData({uMedia: {isLoading: true,}}))
        const res = await resfulClient.post('/api/rally_backup/import', formData)
        dispatch(setMerge({uMedia: {isLoading: false, data: res.data}}))
    }
}


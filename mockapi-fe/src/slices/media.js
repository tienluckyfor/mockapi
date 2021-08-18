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
    // console.log('myMediaList dataset_id', dataset_id)
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
    thumb_files
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
        dispatch(setMerge({pMedia:{isLoading: true}}))
        const {pMedia,} = getState().media
        const {dataset_id_RD,} = getState().rallydatas
        const {checkedList} = getState().commons

        let promises = []
        pMedia.files.map((file) => {
            const formData = new FormData()
            formData.append('file', file)
            formData.append('dataset_id', dataset_id_RD)
            formData.append('source', 'ant-upload')
            promises.push(resfulClient.post('/api/media', formData))
        })
        Promise.all(promises).then(values => {
            let cl = checkedList[name] ? JSON.parse(JSON.stringify(checkedList[name])) : []
            values.map((res) => {
                cl = [...cl, res?.data?.id.toString()]
            })
            dispatch(setCommonMerge('checkedList', {[name]: cl}))
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


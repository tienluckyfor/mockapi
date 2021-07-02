import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient, } from "services";
import {setDatasetMerge} from "./datasets";

export const initialState = {
    cMedium: {isOpen: false},
    adMedium: {},
    dMedium: {},
    eMedium: {},
    epMedium: {isOpen: false},
    duMedium: {},
    mlMedia: {isRefresh: true, search: {name: ``}},
    mMedia: {},
    cbMedia: {},
};

const mediaSlice = createSlice({
    name: "media",
    initialState,
    reducers: {
        setData: (state, {payload}) => {
            Object.entries(initialState).map(([key, value], i) => {
                if (typeof payload[key] !== "undefined") {
                    state[key] = payload[key];
                }
            })
        },
        setMerge: (state, {payload}) => {
            Object.entries(initialState).map(([key, value], i) => {
                if (typeof payload[key] !== "undefined") {
                    state[key] = {...state[key], ...payload[key]}
                }
            })
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
        dispatch(setData({adMedium: {isLoading: true, }}))
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
            })
        } catch (e) {
            dispatch(setMerge({adMedium: {isLoading: false}}))
        }
    }
}

export function deleteMedia(mediaIds) {
    return async (dispatch) => {
        dispatch(setData({adMedium: {isLoading: true, }}))
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
                dispatch(setData({dMedium: delete_media}))
                dispatch(setMerge({mlMedia: {isRefresh: delete_media?.status}}))
            })
        } catch (e) {
            dispatch(setMerge({adMedium: {isLoading: false}}))
        }
    }
}

export function myMediaList(dataset_id) {
    console.log('myMediaList', dataset_id)
    return async (dispatch, getState) => {
        const {mlMedia} = getState().media
        if (mlMedia.isLoading) return;
        dispatch(setMerge({mlMedia: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query {
  my_media_list(name:"${mlMedia.search.name}", dataset_id:"${dataset_id}"){
    id
    file_type
    image
    thumb_image
    name_upload
    updated_at
  }
}`;
        const res = await apolloClient.query({
            query
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


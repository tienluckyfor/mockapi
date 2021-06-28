import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient, } from "services";

export const initialState = {
    cMedium: {isOpen: false},
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
    console.log('setMedia', state)
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setMediaMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function createMedium(medium) {
    return async (dispatch) => {
        dispatch(setMerge({cMedium: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($api_id: ID!, $name: String!, $locale: String!, $amounts: JSON!){
  create_medium(
    input: {
      api_id: $api_id
      name: $name
      locale: $locale
      amounts: $amounts
    }
  ) {
    id
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: medium
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    cMedium: {isLoading: false, isOpen: false},
                    mlMedia: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({cMedium: {isLoading: false}}))
        }
    }
}

export function editMedium(medium) {
    return async (dispatch) => {
        dispatch(setMerge({eMedium: {isLoading: true, medium}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $api_id: ID!, $name: String!, $locale: String!, $amounts: JSON!){
  edit_medium(
    input: {
      id: $id
      api_id: $api_id
      name: $name
      locale: $locale
      amounts: $amounts
    }
  ) {
    id
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: medium
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    eMedium: {isLoading: false, isOpen: false},
                    mlMedia: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({eMedium: {isLoading: false}}))
        }
    }
}

export function editParentMedium(medium) {
    console.log('editParentMedium', medium)
    return async (dispatch) => {
        dispatch(setMerge({epMedium: {isLoading: true, medium}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $parents:JSON){
  edit_parent_medium(
    input: {
      id: $id,
      parents: $parents,
    }
  ) {
    id
    parents
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: medium
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    epMedium: {isLoading: false, isOpen: false},
                    mlMedia: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({epMedium: {isLoading: false}}))
        }
    }
}

export function deleteMedium(medium) {
    return async (dispatch) => {
        dispatch(setData({dMedium: {isLoading: true, medium}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  delete_medium(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: medium
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.delete_medium
                dispatch(setMerge({
                    dMedium: {isLoading: false, status,},
                    mlMedia: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({dMedium: {isLoading: false, medium: null}}))
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

export function duplicateMedium(medium) {
    return async (dispatch) => {
        dispatch(setData({duMedium: {isLoading: true, medium}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  duplicate_medium(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: medium
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.duplicate_medium
                dispatch(setMerge({
                    duMedium: {isLoading: false, status,},
                    mlMedia: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({duMedium: {isLoading: false}}))
        }
    }
}


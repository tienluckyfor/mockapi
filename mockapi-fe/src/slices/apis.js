import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient,} from "services";
import _slice_common from "./_slice_common";

export const initialState = {
    cApi: {isOpen: false},
    dApi: {},
    eApi: {},
    duApi: {},
    modalApi: {},
    mlApi: {isRefresh: true, search: {name: ``}},
    lApi: {isRefresh: true, search: {name: ``}},

};

const apisSlice = createSlice({
    name: "apis",
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


export const {setData, setMerge} = apisSlice.actions
export const apisSelector = (state) => state.apis
export default apisSlice.reducer

export function setApi(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setApiMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function createApi(variables) {
    return async (dispatch) => {
        dispatch(setMerge({cApi: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($name: String!){
  create_api(
    input: {
      name: $name,
    }
  ) {
    id
    name
    created_at
    updated_at
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    cApi: {isLoading: false, isOpen: false},
                    lApi: {isRefresh: true},
                }))
            })
        } catch (e) {
            dispatch(setMerge({cApi: {isLoading: false}}))
        }
    }
}

export function editApi(api) {
    return async (dispatch) => {
        dispatch(setData({eApi: {isLoading: true, api}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $name: String!){
  edit_api(
    input: {
      id: $id,
      name: $name,
    }
  ) {
    id
    name
    created_at
    updated_at
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: api
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    eApi: {isLoading: false, isOpen: false},
                    lApi: {isRefresh: true},
                }))
            })
        } catch (e) {
            dispatch(setMerge({eApi: {isLoading: false}}))
        }
    }
}

export function deleteApi(api) {
    return async (dispatch) => {
        dispatch(setData({dApi: {isLoading: true, api}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  delete_api(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: api
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.delete_api
                dispatch(setMerge({
                    dApi: {isLoading: false, status,},
                    lApi: {isRefresh: true},
                }))
            })
        } catch (e) {
            dispatch(setMerge({
                dApi: {isLoading: false, api: null},
                lApi: {isRefresh: true},
            }))
        }
    }
}

export function listApi() {
    return async (dispatch, getState) => {
        const {lApi} = getState().apis
        if (lApi.isLoading) return;
        dispatch(setMerge({lApi: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query ($name: String) {
  apis(name:$name) {
            id
            name
            updated_at
    shares{
        user_invite{
            id
            name
            medium {
                id
                file
            }
        }
    }
    user{
        id
        name
        medium{
            id
            file
        }
    }
  }
}`;
        const res = await apolloClient.query({
            query,
            variables: {name: lApi.search.name}
        })
        const apiList = res?.data?.apis ?? []
        dispatch(setMerge({
            lApi:
                {
                    isLoading: false,
                    data: apiList,
                    isRefresh: false,
                    search: {...lApi.search, total: apiList.length},
                }
        }))
    }
}

export function duplicateApi(api) {
    return async (dispatch) => {
        dispatch(setData({duApi: {isLoading: true, api}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  duplicate_api(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: api
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.duplicate_api
                dispatch(setMerge({
                    duApi: {isLoading: false, status,},
                    lApi: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({duApi: {isLoading: false}}))
        }
    }
}


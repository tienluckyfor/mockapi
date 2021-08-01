import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient,} from "services";
import {setRallydataMerge} from "./rallydatas";
import _slice_common from "./_slice_common";

export const initialState = {
    cDataset: {isOpen: false},
    dDataset: {},
    eDataset: {},
    epDataset: {isOpen: false},
    duDataset: {},
    mlDataset: {isRefresh: true, search: {name: ``}},
    lDataset: {isRefresh: true, search: {name: ``}},
    amounts: {},
    modalDataset: {},
};

const datasetsSlice = createSlice({
    name: "datasets",
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


export const {setData, setMerge} = datasetsSlice.actions
export const datasetsSelector = (state) => state.datasets
export default datasetsSlice.reducer

export function setDataset(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setDatasetMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function createDataset(dataset) {
    return async (dispatch) => {
        dispatch(setMerge({cDataset: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($api_id: ID!, $name: String!, $locale: String!, $amounts: JSON!){
  create_dataset(
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
                variables: dataset
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    cDataset: {isLoading: false, isOpen: false},
                    lDataset: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({cDataset: {isLoading: false}}))
        }
    }
}

export function editDataset(dataset) {
    return async (dispatch) => {
        dispatch(setMerge({eDataset: {isLoading: true, dataset}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $api_id: ID!, $name: String!, $locale: String!, $amounts: JSON){
  edit_dataset(
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
                variables: dataset
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    eDataset: {isLoading: false, isOpen: false},
                    lDataset: {isRefresh: true},
                    mlDRRallydata: {isRefresh: true}
                }))
                dispatch(setRallydataMerge('mlDRRallydata', {isRefresh: true}))
            })
        } catch (e) {
            dispatch(setMerge({eDataset: {isLoading: false}}))
        }
    }
}

export function editParentDataset(dataset) {
    return async (dispatch) => {
        dispatch(setMerge({epDataset: {isLoading: true, dataset}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $parents:JSON){
  edit_parent_dataset(
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
                variables: dataset
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    epDataset: {isLoading: false, isOpen: false},
                    lDataset: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({epDataset: {isLoading: false}}))
        }
    }
}

export function deleteDataset(dataset) {
    return async (dispatch) => {
        dispatch(setData({dDataset: {isLoading: true, dataset}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  delete_dataset(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: dataset
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.delete_dataset
                dispatch(setMerge({
                    dDataset: {isLoading: false, status,},
                    lDataset: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({dDataset: {isLoading: false, dataset: null}}))
        }
    }
}

export function myDatasetList() {
    return async (dispatch, getState) => {
        const {mlDataset} = getState().datasets
        if (mlDataset.isLoading) return;
        dispatch(setMerge({mlDataset: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query {
  my_dataset_list(name:"${mlDataset.search.name}")
}`;
        const res = await apolloClient.query({
            query
        })
        const myDatasetList = res?.data?.my_dataset_list ?? []
        dispatch(setMerge({
            mlDataset:
                {
                    isLoading: false,
                    data: myDatasetList,
                    isRefresh: false,
                    search: {...mlDataset.search, total: myDatasetList?.datasets.length},
                }
        }))
    }
}

export function listDataset() {
    return async (dispatch, getState) => {
        const {lDataset} = getState().datasets
        if (lDataset.isLoading) return;
        dispatch(setData({lDataset: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query($name: String) {
  datasets(name:$name){
    id
    name
    locale
    updated_at
    user{
        id
        name
        medium{
            id
            file
            thumb_image
        }
    }
    postman{
        collection
        environment
    }
    api{
        id
        name
    }
    rallydatas{
        resource_name
        aggregate
    }
  }
}`;
        const res = await apolloClient.query({
            query,
            variables: {name: lDataset.search.name}
        })
        // const myDatasetList = res?.data?.my_dataset_list ?? []
        dispatch(setMerge({
            lDataset:
                {
                    isLoading: false,
                    data: res?.data,
                    isRefresh: false,
                    search: {...lDataset.search, total: (res?.data?.datasets ?? []).length},
                }
        }))
    }
}

export function duplicateDataset(dataset) {
    return async (dispatch) => {
        dispatch(setData({duDataset: {isLoading: true, dataset}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  duplicate_dataset(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: {id: dataset.id}
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.duplicate_dataset
                dispatch(setMerge({
                    duDataset: {isLoading: false, status,},
                    lDataset: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({duDataset: {isLoading: false}}))
        }
    }
}


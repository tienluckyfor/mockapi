import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient, } from "services";
import {setRallydataMerge} from "./rallydatas";

export const initialState = {
    cDataset: {isOpen: false},
    dDataset: {},
    eDataset: {},
    epDataset: {isOpen: false},
    duDataset: {},
    mlDataset: {isRefresh: true, search: {name: ``}},
    amounts: {},
    modalDataset: {},
};

const datasetsSlice = createSlice({
    name: "datasets",
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
                    mlDataset: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({cDataset: {isLoading: false}}))
        }
    }
}

export function editDataset(dataset) {
    console.log('editDataset dataset', dataset)
    return async (dispatch) => {
        dispatch(setMerge({eDataset: {isLoading: true, dataset}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $api_id: ID!, $name: String!, $locale: String!, $amounts: JSON!){
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
                    mlDataset: {isRefresh: true},
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
                    mlDataset: {isRefresh: true}
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
                    mlDataset: {isRefresh: true}
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
                variables: dataset
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.duplicate_dataset
                dispatch(setMerge({
                    duDataset: {isLoading: false, status,},
                    mlDataset: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({duDataset: {isLoading: false}}))
        }
    }
}


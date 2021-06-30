import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient,} from "services";
import {setDatasetMerge} from "./datasets";
import {useSelector} from "react-redux";
import {diffObject} from "../services/convert";

export const initialState = {
    cRallydata: {isOpen: true},
    dRallydata: {},
    eRallydata: {},
    epRallydata: {isOpen: false},
    duRallydata: {},
    mlRallydata: {isRefresh: true, search: {name: ``}},
    mlDRRallydata: {isRefresh: true},
    deRallydata: {},
    dataset_id_RD: 1,
    resource_id_RD: null,
    mRallydata: {},
    mRallydataData: [],
    fieldsRallydata: {},
    cbRallydata: {},
};

const rallydatasSlice = createSlice({
    name: "rallydatas",
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


export const {setData, setMerge} = rallydatasSlice.actions
export const rallydatasSelector = (state) => state.rallydatas
export default rallydatasSlice.reducer

export function setRallydata(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setRallydataMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function createRallydata(rallydata) {
    return async (dispatch) => {
        dispatch(setMerge({cRallydata: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($dataset_id: ID!, $resource_id: ID!, $data: JSON!, $data_children: JSON){
  create_rallydata(
    input: {
      dataset_id: $dataset_id
      resource_id: $resource_id
      data: $data
      data_children: $data_children
    }
  ) {
    id
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: rallydata
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    cRallydata: {isLoading: false, isOpen: false},
                    mlDRRallydata: {isRefresh: true}
                }))
                dispatch(setDatasetMerge(`mlDataset`, {
                    isRefresh: true
                }))
            })
        } catch (e) {
            dispatch(setMerge({cRallydata: {isLoading: false}}))
        }
    }
}

export function editRallydata(rallydata) {
    return async (dispatch) => {
        dispatch(setMerge({eRallydata: {isLoading: true, rallydata}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $dataset_id: ID!, $resource_id: ID!, $data: JSON!){
  edit_rallydata(
    input: {
      id: $id
      dataset_id: $dataset_id
      resource_id: $resource_id
      data: $data
    }
  ) {
    id
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: rallydata
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    eRallydata: {isLoading: false, isOpen: false},
                    mlDRRallydata: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({eRallydata: {isLoading: false}}))
        }
    }
}

export function editParentRallydata(rallydata) {
    console.log('editParentRallydata', rallydata)
    return async (dispatch) => {
        dispatch(setMerge({epRallydata: {isLoading: true, rallydata}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $parents:JSON){
  edit_parent_rallydata(
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
                variables: rallydata
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    epRallydata: {isLoading: false, isOpen: false},
                    mlRallydata: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({epRallydata: {isLoading: false}}))
        }
    }
}

export function deleteRallydata(rallydata) {
    return async (dispatch) => {
        dispatch(setData({dRallydata: {isLoading: true, rallydata}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  delete_rallydata(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: rallydata
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.delete_rallydata
                dispatch(setMerge({
                    dRallydata: {isLoading: false, status,},
                    mlDRRallydata: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({dRallydata: {isLoading: false}}))
        }
    }
}

export function myRallydataList() {
    return async (dispatch, getState) => {
        const {dataset_id_RD, resource_id_RD} = getState().rallydatas

        dispatch(setMerge({
            mlDRRallydata: {isLoading: true, isRefresh: false},
            mRallydataData: {isLoading: true,},
        }))
        const query = gql`
        query {
  my_rallydata_list(dataset_id:"${dataset_id_RD}", resource_id:"${resource_id_RD}")
}`;
        const res = await apolloClient.query({
            query
        })
        const myRallydataList = res?.data?.my_rallydata_list?.rallydatas ?? {};
        dispatch(setMerge({
            mlDRRallydata: {
                isLoading: false,
                data: myRallydataList[resource_id_RD] ?? [],
                isRefresh: false,
            },
            mRallydataData: {
                isLoading: false,
                data: diffObject([resource_id_RD], myRallydataList),
            }
        }))
        // dispatch(setData({
        //     mRallydataData: myRallydataList,
        // }))
    }
}
/*

export function myRallydataList1(resource_id = null) {
    return async (dispatch, getState) => {
        let resourceId = resource_id
        const {dataset_id_RD, resource_id_RD} = getState().rallydatas
        if (!resourceId) {
            resourceId = resource_id_RD
        }
        if (!(dataset_id_RD && resourceId)) return;
        if (resource_id === null) {
            dispatch(setMerge({mlDRRallydata: {isLoading: true, isRefresh: false}}))
        }
        const query = gql`
        query {
  my_rallydata_list(dataset_id:"${dataset_id_RD}", resource_id:"${resourceId}")
}`;
        const res = await apolloClient.query({
            query
        })
        const myRallydataList = res?.data?.my_rallydata_list?.rallydatas ?? []
        if (resource_id === null) {
            dispatch(setMerge({
                mlDRRallydata: {
                    isLoading: false,
                    data: myRallydataList,
                    isRefresh: false,
                }
            }))
            return;
        }
        dispatch(setData({
            mRallydataData: myRallydataList,
        }))
    }
}
*/

export function detailRallydata(dataset_id) {
    return async (dispatch, getState) => {
        const {deRallydata} = getState().rallydatas
        if (deRallydata.isLoading) return;
        dispatch(setMerge({deRallydata: {isLoading: true}}))
        const query = gql`
        query {
  detail_rallydata(dataset_id:"${dataset_id}")
}`;
        const res = await apolloClient.query({
            query
        })
        const detailRallydata = res?.data?.detail_rallydata ?? {}
        dispatch(setMerge({
            deRallydata:
                {
                    isLoading: false,
                    data: detailRallydata,
                }
        }))
    }
}

export function duplicateRallydata(rallydata) {
    return async (dispatch) => {
        dispatch(setData({duRallydata: {isLoading: true, rallydata}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  duplicate_rallydata(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: rallydata
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.duplicate_rallydata
                dispatch(setMerge({
                    duRallydata: {isLoading: false, status,},
                    mlDRRallydata: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({duRallydata: {isLoading: false}}))
        }
    }
}

export function setFieldsRallydata() {
    return async (dispatch, getState) => {
        const {deRallydata} = getState().rallydatas
        let resources = (deRallydata?.data?.resources ?? []);
        for (const key in resources) {
            const r = resources[key]
            dispatch(setMerge({fieldsRallydata: {[r.id]: r?.fields}}))
        }
    }
}


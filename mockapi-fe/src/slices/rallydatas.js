import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient,} from "services";
import {setDatasetMerge} from "./datasets";
import {diffObject} from "services/convert";
import _slice_common from "./_slice_common";

export const initialState = {
    cRallydata: {isOpen: false},
    dRallydata: {},
    eRallydata: {},
    epRallydata: {isOpen: false},
    duRallydata: {},
    mlRallydata: {isRefresh: true, search: {name: ``}},
    mlDRRallydata: {isRefresh: true},
    deRallydata: {},
    dataset_id_RD: null,
    resource_id_RD: null,
    mRallydata: {},
    mRallydataData: [],
    fieldsRallydata: {},
    cbRallydata: {},
    fRallydata: {isOpen: false},
    rRallydata: {},
};

const rallydatasSlice = createSlice({
    name: "rallydatas",
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
    // console.log('createRallydata rallydata',  rallydata);
    // return ;
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
                    cRallydata: {isLoading: false, isOpen: false, rallydata},
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
        dispatch(setMerge({eRallydata: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $dataset_id: ID!, $resource_id: ID!, $data: JSON!, $data_children: JSON){
  edit_rallydata(
    input: {
      id: $id
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
                    eRallydata: {isLoading: false, isOpen: false},
                    mlDRRallydata: {isRefresh: true},
                    fRallydata: {isRefresh: true},
                }))
            })
        } catch (e) {
            dispatch(setMerge({eRallydata: {isLoading: false}}))
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

export function myRallydataList(isLoading=true) {
    return async (dispatch, getState) => {
        const {dataset_id_RD, resource_id_RD} = getState().rallydatas
        dispatch(setMerge({
            mlDRRallydata: {isLoading, isRefresh: false},
            mRallydataData: {isLoading: true,},
        }))
        const query = gql`
        query($dataset_id: ID!, $resource_id: ID) {
  my_rallydata_list(
    dataset_id: $dataset_id
    resource_id: $resource_id
  ) 
}`;
        const res = await apolloClient.query({
            query,
            variables: {
                dataset_id: dataset_id_RD,
                resource_id: resource_id_RD,
            }
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
    }
}

export function detailRallydata(dataset_id) {
    return async (dispatch, getState) => {
        const {deRallydata} = getState().rallydatas
        if (deRallydata.isLoading) return;
        dispatch(setMerge({deRallydata: {isLoading: true}}))
        const query = gql`
        query($dataset_id: ID!) {
  detail_rallydata(dataset_id: $dataset_id){
    dataset{
        id
        name
        locale
        api{
            id
        }
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
    }
    resources
}
}`;
        const res = await apolloClient.query({
            query,
            variables: {dataset_id}
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

export function findRallydata(dataset_id, find) {
    return async (dispatch) => {
        dispatch(setMerge({fRallydata: {isLoading: true, isRefresh: false, find}}))
        const mutationAPI = () => {
            const mutation = gql`
            query($dataset_id: ID!, $find: String) {
  find_rallydata(
    dataset_id: $dataset_id
    find: $find
  ){
      id
      resource{id}
      data
  }
}`;
            return apolloClient.mutate({
                mutation,
                variables: {dataset_id, find}
            })
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    fRallydata: {isLoading: false, data: res?.data?.find_rallydata},
                }))
            })
        } catch (e) {
            dispatch(setMerge({fRallydata: {isLoading: false}}))
        }
    }
}

export function replaceRallydata(ids, find, replace) {
    return async (dispatch) => {
        dispatch(setMerge({rRallydata: {isLoading: true, ids, find, replace}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($ids: [ID]!, $find: String, $replace: String){
  replace_rallydata(
    input: {
      ids: $ids,
      find: $find,
      replace: $replace
    }
  )
}`;
            return apolloClient.mutate({
                mutation,
                variables: {ids, find, replace}
            })
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    rRallydata: {isLoading: false, status: res?.data?.replace_rallydata},
                    fRallydata: {isRefresh: true},
                }))
            })
        } catch (e) {
            dispatch(setMerge({rRallydata: {isLoading: false}}))
        }
    }
}


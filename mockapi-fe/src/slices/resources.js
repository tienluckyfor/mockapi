import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient, } from "services";
import {setDatasetMerge} from "./datasets";
import _slice_common from "./_slice_common";

export const initialState = {
    cResource: {isOpen: false},
    dResource: {},
    eResource: {},
    epResource: {isOpen: false},
    duResource: {},
    mlResource: {isRefresh: true, search: {name: ``}},
    lResource: {isRefresh: true, search: {name: ``}},
};

const resourcesSlice = createSlice({
    name: "resources",
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


export const {setData, setMerge} = resourcesSlice.actions
export const resourcesSelector = (state) => state.resources
export default resourcesSlice.reducer

export function setResource(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setResourceMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function createResource(resource) {
    return async (dispatch) => {
        dispatch(setMerge({cResource: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($api_id: ID!, $name: String!, $field_template: String, $fields:JSON!, $endpoints:JSON!){
  create_resource(
    input: {
      api_id: $api_id,
      name: $name,
      field_template: $field_template,
      fields: $fields,
      endpoints: $endpoints,
    }
  ) {
    id
    name
    field_template
    parents
    statuses
    fields
    endpoints
    created_at
    updated_at
    api{
      id
      name
    }
    user{
      id
      name
    }
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: resource
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    cResource: {isLoading: false, isOpen: false},
                    mlResource: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({cResource: {isLoading: false}}))
        }
    }
}

export function editResource(resource) {
    return async (dispatch) => {
        dispatch(setMerge({eResource: {isLoading: true, resource}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $api_id: ID!, $name: String!, $field_template: String, $fields:JSON!, $endpoints:JSON!){
  edit_resource(
    input: {
      id: $id,
      api_id: $api_id,
      name: $name,
      field_template: $field_template,
      fields: $fields,
      endpoints: $endpoints,
    }
  ) {
    id
    name
    field_template
    parents
    statuses
    fields
    endpoints
    created_at
    updated_at
    api{
      id
      name
    }
    user{
      id
      name
    }
  }
}
`;
            return apolloClient.mutate({
                mutation,
                variables: resource
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    eResource: {isLoading: false, isOpen: false},
                    mlResource: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({eResource: {isLoading: false}}))
        }
    }
}

export function editParentResource(resource) {
    console.log('editParentResource', resource)
    return async (dispatch) => {
        dispatch(setMerge({epResource: {isLoading: true, resource}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!, $parents:JSON){
  edit_parent_resource(
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
                variables: resource
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    epResource: {isLoading: false, isOpen: false},
                    mlResource: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({epResource: {isLoading: false}}))
        }
    }
}

export function deleteResource(resource) {
    return async (dispatch) => {
        dispatch(setData({dResource: {isLoading: true, resource}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  delete_resource(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: resource
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.delete_resource
                dispatch(setMerge({
                    dResource: {isLoading: false, status, resource: null},
                    mlResource: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({dResource: {isLoading: false, resource: null}}))
        }
    }
}

export function myResourceList(api_id = ``) {
    return async (dispatch, getState) => {
        const {mlResource} = getState().resources
        if (mlResource.isLoading) return;
        dispatch(setMerge({mlResource: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query {
  my_resource_list(name:"${mlResource.search.name}", api_id:"${api_id}")
}`;
        const res = await apolloClient.query({
            query
        })
        dispatch(setMerge({
            mlResource: {isLoading: false},
        }))
        const myResourceList = res?.data?.my_resource_list ?? []

        if (api_id === ``) {
            dispatch(setMerge({
                mlResource:
                    {
                        data: myResourceList,
                        search: {...mlResource.search, total: myResourceList?.resources.length},
                    }
            }))
            return;
        }
        dispatch(setDatasetMerge(`cDataset`, {
            resources: myResourceList?.resources,
        }))
    }
}

export function listResource(api_id = null) {
    return async (dispatch, getState) => {
        const {lResource} = getState().resources
        if (lResource.isLoading) return;
        dispatch(setMerge({lResource: {isLoading: true, isRefresh: false}}))
        const query = gql`
        query ($name: String, $api_id: ID) {
  resources(name:$name, api_id: $api_id) {
      resources{
          id
          name
          api{id}
          field_template
          parents
          statuses
          fields
          endpoints
          updated_at
      }
      apis{
          id
          name
          updated_at
          thumb_sizes
    shares{
        user_invite{
            id
            name
            medium {
                id
                file
                thumb_files
            }
        }
    }
    user{
        id
        name
        medium{
            id
            file
            thumb_files
        }
    }
      }
  }
}`;
        const res = await apolloClient.query({
            query,
            variables:{name: lResource.search.name, api_id}
        })
        dispatch(setMerge({
            lResource: {isLoading: false},
        }))
        const resourceList = res?.data?.resources ?? []

        if (api_id === ``) {
            dispatch(setMerge({
                lResource:
                    {
                        data: resourceList,
                        search: {...lResource.search, total: resourceList?.resources.length},
                    }
            }))
            return;
        }
        dispatch(setDatasetMerge(`cDataset`, {
            resources: resourceList?.resources,
        }))
    }
}

export function duplicateResource(resource) {
    return async (dispatch) => {
        dispatch(setData({duResource: {isLoading: true, resource}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  duplicate_resource(
    input: {
      id: $id,
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: resource
            });
        }
        try {
            await mutationAPI().then(res => {
                const status = res?.data?.duplicate_resource
                dispatch(setMerge({
                    duResource: {isLoading: false, status,},
                    mlResource: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({duResource: {isLoading: false}}))
        }
    }
}


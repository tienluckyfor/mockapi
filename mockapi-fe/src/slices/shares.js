import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient,} from "services";
import _slice_common from "./_slice_common";

export const initialState = {
    cShare: {},
    dShare: {},
    eShare: {},
    lShare: {isRefresh: true},
};

const sharesSlice = createSlice({
    name: "shares",
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


export const {setData, setMerge} = sharesSlice.actions
export const sharesSelector = (state) => state.shares
export default sharesSlice.reducer

export function setShare(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setShareMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function createShare(variables) {
    return async (dispatch) => {
        dispatch(setData({cShare: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($user_invite_id: ID!, $shareable_type: String!, $shareable_id: ID!){
  create_share(
    input: {
      user_invite_id: $user_invite_id
      shareable_type: $shareable_type
      shareable_id: $shareable_id
    }
  ) {
    id
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
                    cShare: {isLoading: false, data: res?.data?.create_share},
                    lShare: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({cShare: {isLoading: false}}))
        }
    }
}

export function deleteShare(id) {
    return async (dispatch) => {
        dispatch(setData({dShare: {isLoading: true, id}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($id: ID!){
  delete_share(
    input: {
      id: $id
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: {id}
            });
        }
        try {
            await mutationAPI().then(res => {
                dispatch(setMerge({
                    dShare: {isLoading: false, status: true},
                    lShare: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({dShare: {isLoading: false}}))
        }
    }
}

export function shareList(shareable_type, shareable_id) {
    return async (dispatch) => {
        dispatch(setData({lShare: {isLoading: true, }}))
        const query = gql`
       query ($shareable_type: String!, $shareable_id: ID!) {
  shares(shareable_type: $shareable_type, shareable_id: $shareable_id) {
    id
    is_owner
    updated_at
    user_invite {
      id
      name
      medium {
        id
        file
        thumb_image
      }
    }
  }
}
`;
        const res = await apolloClient.query({
            query,
            variables: {shareable_type, shareable_id}
        })
        dispatch(setData({lShare: {isLoading: false, data: res?.data,}}))
    }
}

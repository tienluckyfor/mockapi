import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient,} from "services";
import Cookies from "universal-cookie";
import _slice_common from "./_slice_common";

export const initialState = {
    cUser: {},
    dUser: {},
    eUser: {},
    duUser: {},
    mlUser: {isRefresh: true, search: {name: ``}},
    lUser: {isRefresh: true, },
    qMe: {},
    lsUser: {}
};

const usersSlice = createSlice({
    name: "users",
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


export const {setData, setMerge} = usersSlice.actions
export const usersSelector = (state) => state.users
export default usersSlice.reducer

export function setUser(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setUserMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

const cookies = new Cookies()

export function queryMe(href = ``) {
    return async (dispatch) => {
        if (href.match(/Login|Register/gim)) return;
        dispatch(setMerge({qMe: {isLoading: true}}))
        const query = gql`
        query {
  me {
      id
      name
      email
      created_at
      updated_at
      apis_count
      resources_count
      datasets_count
      medium{
          id
          file
          thumb_image
      }
      datasets{
          id 
          name 
          user{
            id
          }
          resources{
              id
          }
          shares{
              id
              user_invite{
                  id
                  name
                  medium{
                      id
                      file
                      thumb_image
                  }
              }
          }
      }
  }
}`;
        const res = await apolloClient.query({
            query
        })
        const qMe = res?.data?.me
        if (qMe) {
            dispatch(setMerge({qMe: {isLoading: false, data: qMe}}))
        } else {
            dispatch(setMerge({qMe: {isLoading: false, data: null}}))
            cookies.remove('mockapi-token')
            if (!href.match(/Login|Register/gim)) {
                const ref = btoa(window.location.href)
                window.location.assign(`/LoginPage?ref=${ref}`)
            }
        }
    }
}

export function editUser(user) {
    user.media_ids = user.avatar
    return async (dispatch) => {
        dispatch(setData({eUser: {isLoading: true,}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($name: String!, $email: String!, $media_ids: [ID], $password: String, $password_confirmation: String){
  edit_user(
    input: {
      name: $name
      email: $email
      media_ids: $media_ids
      password: $password
      password_confirmation: $password_confirmation
    }
  )
}
`;
            return apolloClient.mutate({
                mutation,
                variables: user
            });
        }
        try {
            await mutationAPI().then(res => {
                console.log('res', res)
                dispatch(setMerge({
                    eUser: {isLoading: false, status: res?.data?.edit_user},
                    //     mlUser: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({eUser: {isLoading: false}}))
        }
    }
}

export function userList(variables) {
    return async (dispatch) => {
        const query = gql`
        query($name: String, $dataset_id: ID) {
  users(name: $name, dataset_id: $dataset_id) {
    id
    name
    email
    medium{
        id
        image
        thumb_image
    }
  }
}`;
        const res = await apolloClient.query({
            query,
            variables
        })
        dispatch(setMerge({lUser: {isLoading: false, data: res?.data}}))
    }
}


export function shareSearchUsers(shareable_type, shareable_id, name) {
    return async (dispatch) => {
        dispatch(setData({lsUser: {isLoading: true}}))
        const query = gql`
        query($name: String, $shareable_type: String!, $shareable_id: ID!) {
  share_search_users(name: $name, shareable_type: $shareable_type, shareable_id: $shareable_id) {
    id
    name
    email
    medium{
        id
        file
        thumb_image
    }
  }
}`;
        const res = await apolloClient.query({
            query,
            variables: {shareable_type, shareable_id, name}
        })
        dispatch(setMerge({lsUser: {isLoading: false, data: res?.data}}))
    }
}

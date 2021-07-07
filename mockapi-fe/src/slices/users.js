import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient, } from "services";
import Cookies from "universal-cookie";

export const initialState = {
    cUser: {},
    dUser: {},
    eUser: {},
    duUser: {},
    mlUser: {isRefresh: true, search: {name: ``}},
    qMe: {}
};

const usersSlice = createSlice({
    name: "users",
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
        if(href.match(/Login|Register/gim)) return;
        dispatch(setMerge({qMe: {isLoading: true}}))
        const query = gql`
        query {
  me {
      id
      name
      email
      created_at
      updated_at
      total
      media{
          id
          image
          thumb_image
      }
      datasets{
          id 
          name 
          resources{
              id
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
                window.location.assign(`/LoginPage`)
            }
        }
    }
}

export function editUser(user) {
    user.media_ids = user.avatar
    return async (dispatch) => {
        dispatch(setData({eUser: {isLoading: true, }}))
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
                    eUser: {isLoading: false, status:res?.data?.edit_user},
                //     mlUser: {isRefresh: true}
                }))
            })
        } catch (e) {
            dispatch(setMerge({eUser: {isLoading: false}}))
        }
    }
}


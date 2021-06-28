import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient} from "services";
import Cookies from "universal-cookie";

export const initialState = {
    register: {},
    login: {},
    me: {},
};

const authsSlice = createSlice({
    name: "auths",
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


export const {setData, setMerge} = authsSlice.actions
export const authsSelector = (state) => state.auths
export default authsSlice.reducer

export function setAuth(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setAuthMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

const cookies = new Cookies()

export function registerHandle(variables) {
    return async (dispatch) => {
        dispatch(setMerge({register: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($name: String!, $email: String!, $password: String!, $password_confirmation:String!){
  register(
    input: {
      name: $name,
      email: $email,
      password: $password,
      password_confirmation: $password_confirmation 
    }
  ) {
    tokens{
      access_token
    }
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
                const access_token = res?.data?.register?.tokens?.access_token
                console.log('access_token', access_token)
                cookies.set('mockapi-token', access_token,
                    {path: '/', expires: new Date(Date.now() + 99999999999)})
                window.location.assign(`/`)
            })
        } catch (e) {
            dispatch(setMerge({register: {isLoading: false}}))
        }
    }
}

export function loginHandle(variables) {
    return async (dispatch) => {
        dispatch(setMerge({login: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation($username: String!, $password: String!){
  login(
    input: {
      username: $username,
      password: $password,
    }
  ) {
    access_token
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
                const access_token = res?.data?.login?.access_token
                console.log('access_token', access_token)
                cookies.set('mockapi-token', access_token,
                    {path: '/', expires: new Date(Date.now() + 99999999999)})
                window.location.assign(`/`)
            })
        } catch (e) {
            dispatch(setMerge({login: {isLoading: false}}))
        }
    }
}

export function getMe(href = ``) {
    return async (dispatch) => {
        if(href.match(/Login|Register/gim)) return;
        dispatch(setMerge({me: {isLoading: true}}))
        const query = gql`
        query {
  me {
      id
      name
      email
      created_at
      updated_at
      total
      datasets{
        id 
        name
      }
  }
}`;
        const res = await apolloClient.query({
            query
        })
        const me = res?.data?.me
        if (me) {
            dispatch(setMerge({me: {isLoading: false, data: me}}))
        } else {
            dispatch(setMerge({me: {isLoading: false, data: null}}))
            cookies.remove('mockapi-token')
            if (!href.match(/Login|Register/gim)) {
                window.location.assign(`/LoginPage`)
            }
        }
    }
}

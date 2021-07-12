import {createSlice} from "@reduxjs/toolkit";
import gql from "graphql-tag";
import {apolloClient} from "services";
import Cookies from "universal-cookie";
import _slice_common from "./_slice_common";

export const initialState = {
    rAuth: {},
    lAuth: {},
    loAuth: {},
};

const authsSlice = createSlice({
    name: "auths",
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

export function authRegister(variables) {
    return async (dispatch) => {
        dispatch(setMerge({rAuth: {isLoading: true}}))
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
                cookies.set('mockapi-token', res?.data?.register?.tokens?.access_token,
                    {path: '/', expires: new Date(Date.now() + 99999999999)})
                window.location.assign(`/`)
            })
        } catch (e) {
            dispatch(setMerge({rAuth: {isLoading: false}}))
        }
    }
}

export function authLogin(variables) {
    return async (dispatch) => {
        dispatch(setMerge({lAuth: {isLoading: true}}))
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
                cookies.set('mockapi-token', res?.data?.login?.access_token,
                    {path: '/', expires: new Date(Date.now() + 99999999999)})
                window.location.assign(`/`)
            })
        } catch (e) {
            dispatch(setMerge({lAuth: {isLoading: false}}))
        }
    }
}

export function authLogout() {
    return async (dispatch) => {
        dispatch(setData({loAuth: {isLoading: true}}))
        const mutationAPI = () => {
            const mutation = gql`
            mutation {
  logout {
    status
    message
  }
}
`;
            return apolloClient.mutate({
                mutation
            });
        }
        try {
            await mutationAPI().then(res => {
                if (res?.data?.logout?.status === 'TOKEN_REVOKED') {
                    cookies.remove('mockapi-token');
                    window.location.assign(`/LoginPage`);
                    return;
                }
                dispatch(setMerge({loAuth: {isLoading: false}}))
                // const access_token = res?.data?.logout?.status
                // cookies.set('mockapi-token', access_token,
                //     {path: '/', expires: new Date(Date.now() + 99999999999)})
                // window.location.assign(`/`)
            })
        } catch (e) {
            dispatch(setMerge({loAuth: {isLoading: false}}))
        }
    }
}


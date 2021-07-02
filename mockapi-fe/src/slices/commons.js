import {createSlice} from "@reduxjs/toolkit";

export const initialState = {
    // menu
    visibles: {},
    copied: {},
    // modal
    visible: false,
    // checkbox
    checkedList: {},
    indeterminate: true,
    checkAll: false,
    plainOptions: [],
};

const commonsSlice = createSlice({
    name: "commons",
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

export const {setData, setMerge} = commonsSlice.actions
export const commonsSelector = (state) => state.commons
export default commonsSlice.reducer

export function setCommon(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setCommonMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

// checkbox
export function commonOnCheck(name, plainOptions, listValue) {
    return async (dispatch, getState) => {
        // const {plainOptions, checkedList} = getState().commons
        dispatch(setMerge({checkedList: {[name]: listValue}}))
        dispatch(setData({
            indeterminate: !!listValue.length && listValue.length < plainOptions.length,
            checkAll: listValue.length === plainOptions.length,
        }));
    }
}

export function commonOnCheckAll(name, plainOptions, e) {
    return async (dispatch, getState) => {
        // const {plainOptions} = getState().commons
        const listValue = e.target.checked ? plainOptions : []
        dispatch(setMerge({checkedList: {[name]: listValue}}))
        dispatch(setData({
            // checkedList: e.target.checked ? plainOptions : [],
            indeterminate: false,
            checkAll: e.target.checked,
        }));
    }
}

// menu
export function handleMenuClick(e, rallydata) {
    return async (dispatch, getState) => {
        const {visibles} = getState().commons
        const id = rallydata.originalId ? rallydata.originalId : rallydata.id
        if (e.key === 'delete') {
            dispatch(setData({visibles: {...visibles, ...{[id]: true}}}))
            return;
        }
        dispatch(setData({visibles: {...visibles, ...{[id]: false}}}))
    }
}

export function handleVisibleChange(flag, rallydata) {
    return async (dispatch, getState) => {
        const {visibles} = getState().commons
        const id = rallydata.originalId ? rallydata.originalId : rallydata.id
        dispatch(setData({visibles: {...visibles, ...{[id]: flag}}}))
    }
}


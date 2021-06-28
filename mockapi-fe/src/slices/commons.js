import {createSlice} from "@reduxjs/toolkit";

export const initialState = {
    // menu
    visibles: {},
    copied: {},
    // modal
    visible: false,
    // checkbox
    checkedList: {
        child: [
            44
        ],
        'child-2': [
            1
        ]
    },
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
export function onChange(name, list) {
    // console.log('onChange name, list', {name, list})
    return async (dispatch, getState) => {
        const {plainOptions, checkedList} = getState().commons
        // const {mMedia} = getState().media
        // dispatch(setMerge({checkedList: {[mMedia.name]: list}}))
        // console.log('checkedList', checkedList)
        // console.log('{checkedList: {[name]: list}}', {checkedList: {[name]: list}})
        dispatch(setMerge({checkedList: {[name]: list}}))
        // console.log('checkedList 1', checkedList)
        dispatch(setData({
            // checkedList: list,
            indeterminate: !!list.length && list.length < plainOptions.length,
            checkAll: list.length === plainOptions.length,
        }));
    }
}

export function onCheckAllChange(e) {
    return async (dispatch, getState) => {
        const {plainOptions} = getState().commons
        dispatch(setData({
            checkedList: e.target.checked ? plainOptions : [],
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


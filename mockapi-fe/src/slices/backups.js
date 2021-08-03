import {createSlice} from "@reduxjs/toolkit";
import {resfulClient,} from "services";
import _slice_common from "./_slice_common";

export const initialState = {
    ilBackup: {isRefresh: true,},
    tBackup: {},
    pBackup: {},
};

const backupsSlice = createSlice({
    name: "backups",
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


export const {setData, setMerge} = backupsSlice.actions
export const backupsSelector = (state) => state.backups
export default backupsSlice.reducer

export function setBackup(state) {
    return async (dispatch) => {
        dispatch(setData(state))
    };
}

export function setBackupMerge(key, item) {
    return async (dispatch) => {
        dispatch(setMerge({...{}, [key]: item}))
    }
}

export function BackupImportList() {
    return async (dispatch, getState) => {
        const {ilBackup} = getState().backups
        if (ilBackup.isLoading) return;
        dispatch(setMerge({ilBackup: {isLoading: true, isRefresh: false}}))
        const res = await resfulClient.get('/api/backup/import/list')
        dispatch(setMerge({
            ilBackup:
                {
                    isLoading: false,
                    data: res?.data?.data,
                    isRefresh: false,
                }
        }))
    }
}

export function BackupTake(values) {
    return async (dispatch, getState) => {
        dispatch(setMerge({tBackup: {isLoading: true}}))
        const res = await resfulClient.get('/api/backup/import/take', values)
        dispatch(setMerge({
            tBackup: {
                isLoading: false,
                status: res?.data?.status,
            },
            ilBackup: {isRefresh: true}
        }))
    }
}

export function BackupProcess(values) {
    return async (dispatch, getState) => {
        dispatch(setMerge({pBackup: {isLoading: true, datum: values}}))
        const res = await resfulClient.get('/api/backup/import/process', values)
        dispatch(setMerge({
            pBackup: {
                isLoading: false,
                status: res?.data?.status,
            },
            ilBackup: {isRefresh: true}
        }))
    }
}



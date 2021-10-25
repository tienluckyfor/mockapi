class _slice_common {
    static setData(initialState, state, payload) {
        (Object.entries(initialState) ?? []).forEach(([key, value]) => {
        // });
            // Object.entries(initialState).map(([key, value], i) => {
            if (typeof payload[key] !== "undefined") {
                state[key] = payload[key];
            }
        })
        return state
    }

    static setMerge(initialState, state, payload) {
        console.log('setMerge', {initialState, state, payload});
        (Object.entries(initialState) ?? []).forEach(([key, value]) => {
            // Object.entries(initialState).map(([key, value], i) => {
            if (typeof payload[key] !== "undefined") {
                state[key] = {...state[key], ...payload[key]};
            }
        })
        return state
    }
}

export default _slice_common
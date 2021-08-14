import { combineReducers } from "redux";
import { configureStore } from '@reduxjs/toolkit'

import apisReducer from "./apis";
import authsReducer from "./auths";
import resourcesReducer from "./resources";
import datasetsReducer from "./datasets";
import rallydatasReducer from "./rallydatas";
import commonsReducer from "./commons";
import mediaReducer from "./media";
import usersReducer from "./users";
import sharesReducer from "./shares";
import backupsReducer from "./backups";

const reducer = combineReducers({
    shares: sharesReducer,
    users: usersReducer,
    media: mediaReducer,
    commons: commonsReducer,
    rallydatas: rallydatasReducer,
    datasets: datasetsReducer,
    resources: resourcesReducer,
    auths: authsReducer,
    apis: apisReducer,
    backups: backupsReducer,
});

const store = configureStore({
    reducer,
    middleware: getDefaultMiddleware => {
        return getDefaultMiddleware({ serializableCheck: false })
    }
    // devTools: isProduction,
})
export default store;
// export default rootReducer;

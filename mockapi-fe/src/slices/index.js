import { combineReducers } from "redux";

import apisReducer from "./apis";
import authsReducer from "./auths";
import resourcesReducer from "./resources";
import datasetsReducer from "./datasets";
import rallydatasReducer from "./rallydatas";
import commonsReducer from "./commons";
import mediaReducer from "./media";
import usersReducer from "./users";
import sharesReducer from "./shares";

const rootReducer = combineReducers({
    shares: sharesReducer,
    users: usersReducer,
    media: mediaReducer,
    commons: commonsReducer,
    rallydatas: rallydatasReducer,
    datasets: datasetsReducer,
    resources: resourcesReducer,
    auths: authsReducer,
    apis: apisReducer,
});

export default rootReducer;

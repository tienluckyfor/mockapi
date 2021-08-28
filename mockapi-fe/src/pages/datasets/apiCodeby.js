export const apiCodeby = () => {
    return `import {ApiCodeby, MediaCodeby} from "react-api-codeby";

const Config = {
    "baseURL": "${process.env.REACT_APP_URL}/api/restful",
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhc2V0X2lkIjoiMTMiLCJ1c2VyX2lkIjo0fQ.6UUHpn4pHnIlrxig3cm8WTwybE_SfkiVbJAdYl4NdVs",
    "default": {
        "thumb": "${window.location.origin.toString()}/assets/default/thumb.png",
        "image": "${window.location.origin.toString()}/assets/default/image.png",
    },
}
ApiCodeby.config(Config)
MediaCodeby.config(Config)

export {
    ApiCodeby as apiCodeby,
    MediaCodeby as mediaCodeby,
}`
}

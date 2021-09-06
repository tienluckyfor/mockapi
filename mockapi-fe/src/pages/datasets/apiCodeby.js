export const apiCodeby = (token='') => {
    return `import {ApiCodeby, MediaCodeby} from "react-api-codeby";

const Config = {
    "baseURL": "${process.env.REACT_APP_URL}/api/restful",
    "token": "${token}",
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

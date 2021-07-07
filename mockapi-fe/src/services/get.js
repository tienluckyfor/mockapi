export const getURLParams = () => {
    const params = new URLSearchParams(window.location.search)
    let obj = {};
    for (let param of params) {
        obj[param[0]] = param[1];
    }
    return obj;
}

export const getThumbImage = (thumb_image) => {
    if (thumb_image)
        return thumb_image
    return '/assets/images/default.jpeg'
};
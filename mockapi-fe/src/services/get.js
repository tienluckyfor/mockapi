export const getURLParams = () => {
    const params = new URLSearchParams(window.location.search)
    let obj = {};
    for (let param of params) {
        obj[param[0]] = param[1];
    }
    return obj;
}
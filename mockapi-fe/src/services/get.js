export const getURLParams = () => {
    const params = new URLSearchParams(window.location.search)
    let obj = {};
    for (let param of params) {
        obj[param[0]] = param[1];
    }
    return obj;
}

// export const getThumbImage = (thumb_image) => {
//     if (thumb_image)
//         return thumb_image
//     return '/assets/images/default.jpeg'
// };

export const getFirstThumb = (medium) => {
    return '/assets/images/default.jpeg'

    /*try {
        const {file, thumb_files} = medium;
        if (Object.keys(thumb_files).length)
            return thumb_files[Object.keys(thumb_files)[0]];
        return file;
    } catch (e) {
        return '/assets/images/default.jpeg'
    }*/
};

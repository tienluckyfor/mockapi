export const objToUrlParams = (obj) => {
    return new URLSearchParams(obj).toString();
}

export const diffObject = (keys, obj) => {
    let rObj = {}
    const keys1 = keys.map((k) => k ? k.toString() : k)
    Object.entries(obj).filter(([k, item], i) => {
        if (keys1.indexOf(k) === -1) {
            rObj[k] = item
        }
    })
    return rObj;
}

export const objToString = (obj, isBeauty = false) => {
    if (!obj) return '-'
    try {
        if (isBeauty)
            return JSON.stringify(obj, null, '  ')
        return JSON.stringify(obj)
    } catch (e) {
        console.log('e', e)
        return '-'
    }
}

export const arrayUniqueByKey = (array, key) => {
    return [...new Map(array.map(item =>
        [item[key], item])).values()];
}



export const objToParams = (params) => {
    const str = JSON.stringify(params)
    const result = str.replace(/\{|\}|\"(\w+)\"/g, '$1')
    return result
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


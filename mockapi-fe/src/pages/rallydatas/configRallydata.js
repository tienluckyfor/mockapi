export const getItype = (type, fakerjs = ``) => {
    // console.log('type, fakerjs', {type, fakerjs})
    if (type === 'Faker.js') {
        if (fakerjs.match(/date/gim))
            return `Date`
        if (fakerjs.match(/image/gim))
            return `Media`
        if (fakerjs.match(/text/gim))
            return `Text`
        if (fakerjs.match(/date/gim))
            return `Date`
        if (fakerjs.match(/name/gim))
            return `String`
    }
    return type
}

export const getRallyData = (mRallydataData, resource_id) => {
    return mRallydataData?.data ? mRallydataData?.data[resource_id] ?? [] : []
}

export const handleValues = (fields, values) => {
    let data = {};
    let errCount = 0;
    (Object.entries(values.data) ?? []).forEach(([key, item]) => {
        // console.log('item, key', item, key)
        // Object.entries(values.data).map(([key, item], i) => {
        let field = fields.filter((item1) => item1.name == key)
        field = field[0] ? field[0] : {}
        const iType = getItype(field.type)
        let datum = item
        if (iType == 'Object' || iType == 'Array') {
            try{
                datum = JSON.parse(datum)
            }catch (e) {
                errCount++;
            }
        }
        data[key] = datum
    })
    if(errCount) return null;
    return {...values, data}
}
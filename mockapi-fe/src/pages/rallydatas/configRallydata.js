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
export const fields = [
    {name: `id`, type: `Object ID`},
    {name: `createdAt`, type: `Faker.js`, fakerjs: `datetime.dateTime`},
    {name: `name`, type: `Faker.js`, fakerjs: `person.name`},
    {name: `avatar`, type: `Faker.js`, fakerjs: `image.imageUrl(avatar)`},
]
export const authFields = [
    {name: `_username`, type: `Authentication`},
    {name: `_password`, type: `Authentication`},
    // {name: `_token`, type: `Authentication`},
]
export const endpoints = [
    {name: `get`, type: `get`, json: `$mockData`, status: true,},
    {name: `get`, type: `get_id`, json: `$mockData`, status: true,},
    {name: `post`, type: `post`, json: `$mockData`, status: true,},
    {name: `put`, type: `put`, json: `$mockData`, status: true,},
    {name: `delete`, type: `delete_id`, json: `$mockData`, status: true,},
]
export const fieldTypes = [
    `Faker.js`,
    `Text`,
    `LongText`,
    `Number`,
    `Boolean`,
    `Object`,
    `Array`,
    `Date`,
    `Media`,
    `Select`,
]
export const fakerList = [
    {
        "name": "address",
        "list": {
            "address.postcode": "Zip code",
            "address.city": "City",
            "address.streetAddress": "Street address",
            "address.secondaryAddress": "Secondary address",
            "address.county": "County",
            "address.country": "Country",
            "address.state": "State",
            "address.stateAbbr": "State abbreviated",
            "address.latitude": "Latitude",
            "address.longitude": "Longitude",
            "address.departmentName": "Department name",
        }
    },
    /*{
        "name": "commerce",
        "list": {
            "commerce.department": "Department",
            "commerce.productName": "Product name",
            "commerce.price": "Price",
            "commerce.productAdjective": "Product adjective",
            "commerce.productMaterial": "Product material",
            "commerce.product": "Product",
        }
    },*/
    {
        "name": "company",
        "list": {
            "company.company": "Company name",
            "company.companySuffix": "Company suffix",
            "company.catchPhrase": "Catch phrase",
        }
    },
    {
        "name": "DateTime",
        "list": {
            "datetime.dateTimeThisDecade": "Past",
            "datetime.dateTimeThisYear": "Future",
            "datetime.dateTime": "Recent",
            "datetime.month": "Month",
        }
    },
    /* {
         "name": "finance",
         "list": {
             "finance.account": "Account",
             "finance.accountName": "Account name",
             "finance.mask": "Mask",
             "finance.amount": "Amount",
             "finance.transactionType": "Transaction type",
             "finance.currencyCode": "Currency code",
             "finance.currencyName": "Currency name",
             "finance.currencySymbol": "Currency symbol",
             "finance.bitcoinAddress": "Bitcoin address",
             "finance.iban": "Iban",
             "finance.bic": "Bic",
         }
     },*/
    /*{
        "name": "hacker",
        "list": {
            "hacker.abbreviation": "Abbreviation",
            "hacker.adjective": "Adjective",
            "hacker.noun": "Noun",
            "hacker.verb": "Verb",
            "hacker.phrase": "Phrase",
        }
    },*/
    {
        "name": "image",
        "list": {
            "image.imageUrl": "Image",
            "image.imageUrl(avatar)": "Avatar",
            "image.image": "Data URI",
        }
    },
    {
        "name": "internet",
        "list": {
            "internet.email": "Email",
            "internet.companyEmail": "Company email",
            "internet.userName": "Username",
            "internet.url": "URL",
            "internet.domainName": "Domain name",
            "internet.domainWord": "Domain word",
            "internet.ipv4": "IP",
            "internet.ipv6": "IPV6",
            "userAgent.userAgent": "User agent",
            "internet.macAddress": "Mac address",
            "internet.password": "Password",
        }
    },
    {
        "name": "person",
        "list": {
            "person.firstName": "First name",
            "person.lastName": "Last name",
            "person.name": "Full name",
            "company.jobTitle": "Job title",
            // "name.prefix": "Prefix",
            // "name.suffix": "Suffix",
            // "name.title": "Title",
            // "name.jobDescriptor": "Job descriptor",
            // "name.jobArea": "Job area",
            // "name.jobType": "Job type",
        }
    },
    {
        "name": "phone",
        "list": {
            "phone.phoneNumber": "Number",
        }
    },
    {
        "name": "random",
        "list": {
            "base.randomDigit": "Number",
            // "base.uuid": "UUID",
            // "base.boolean": "Boolean",
            "base.word": "Word",
            "base.text": "Words",
            // "base.locale": "Locale",
            // "base.alphaNumeric": "Alpha numeric",
        }
    },
    /*{
        "name": "system",
        "list": {
            "system.fileName": "File name",
            "system.commonFileName": "Common file name",
            "system.commonFileExt": "Common file extension",
            "system.fileType": "File type",
            "system.fileExt": "File extension",
            "system.semver": "Semver",
        }
    },*/
]


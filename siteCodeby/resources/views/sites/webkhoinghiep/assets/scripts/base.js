// var cookie = {
//     set: function (name, value, days) {
//         var expires = "";
//         if (days) {
//             var date = new Date();
//             date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//             expires = "; expires=" + date.toUTCString();
//         }
//         document.cookie = name + "=" + (value || "") + expires + "; path=/";
//     },
//     setObj: function (name, value, days) {
//         const valueObj = JSON.stringify(value)
//         this.set(name, valueObj, days)
//     },
//     get: function (name) {
//         var nameEQ = name + "=";
//         var ca = document.cookie.split(';');
//         for (var i = 0; i < ca.length; i++) {
//             var c = ca[i];
//             while (c.charAt(0) == ' ') c = c.substring(1, c.length);
//             if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
//         }
//         return null;
//     },
//     getObj: function (name) {
//         const valueObj = this.get(name)
//         return JSON.parse(valueObj)
//     },
// }

function fnErrorHandle(res) {
    if (res.message)
        alert(res.message);
    res.json().then((res) => {
        if (res.message)
            alert(res.message);
    })
}

class CookieClass {
    set(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    setObj(name, value, days) {
        const valueObj = JSON.stringify(value)
        this.set(name, valueObj, days)
    }

    get(name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    getObj(name) {
        try {
            const valueObj = this.get(name)
            return JSON.parse(valueObj)
        } catch (e) {
            return null;
        }
    }
}

class RestfulClass {
    initialize(obj) {
        this.config = {
            url: obj.url ?? 'http://be.mockapi.test/api/restful',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${obj.token}`,
                'Rallytoken': `Bearer ${Cookie.get('Rallytoken')}`,
            },
        }
    }

    get(path, params) {
        return new Promise(async (resolve, reject) => {
            const payload = new URLSearchParams(params)
            fetch(`${this.config.url}${path}?${payload}`, {
                method: 'GET',
                headers: this.config.headers,
            })
                .then(res => res.ok ? res.json() : Promise.reject(res))
                .then((res) => {
                    resolve(res)
                })
                .catch(fnErrorHandle);
        })
    }

    post(path, params) {
        return new Promise(async (resolve, reject) => {
            fetch(`${this.config.url}${path}`, {
                method: 'POST',
                headers: this.config.headers,
                body: JSON.stringify(params),
            })
                .then(res => res.ok ? res.json() : Promise.reject(res))
                .then((res) => {
                    resolve(res)
                })
                .catch(fnErrorHandle);
        })
    }

}

class FormClass {
    getPayload(form) {
        const data = new FormData(form);
        let obj = {};
        for (let [key, value] of data) {
            if (obj[key] !== undefined) {
                if (!Array.isArray(obj[key])) {
                    obj[key] = [obj[key]];
                }
                obj[key].push(value);
            } else {
                obj[key] = value;
            }
        }
        return obj;
    }
}

class MoneyClass {
    convert(money) {
        const money1 = Number(money)
            .toLocaleString("vi-VN", {
                style: "currency",
                currency: "VND",
                minimumFractionDigits: 0
            })
            .replace(/\./g, ',');
        return money1;
    }
}

var Restful = new RestfulClass();
var Form = new FormClass();
var Money = new MoneyClass();
var Cookie = new CookieClass();


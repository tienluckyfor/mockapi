import axios from 'https://cdn.skypack.dev/axios';
import universalCookie from 'https://cdn.skypack.dev/universal-cookie';
import * as http from "http";

const cookies = new universalCookie()
const Http = {
    initialize: function (obj) {
        this.config = {
            url: obj.url ?? 'http://be.mockapi.test/api/restful',
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${obj.token}`,
                'Rallytoken': `Bearer ${cookies.get('authToken')}`,
            },
        }
        this.instance = axios.create(this.config);
    },
    get: async function (path, params) {
        const res = await this.instance.get(path, {params})
        let data = res.data;
        console.log('data', data);
    },
    post: async function (path, params) {
        const res = await this.instance.post(path, {params})
        let data = res.data;
        console.log('data', data);
    },
}
class Form {
    static getPayload(form) {
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

class Money {
    static convert(money) {
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

export {Http, Form, Money}
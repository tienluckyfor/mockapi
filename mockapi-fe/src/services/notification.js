import {notification as antd_notification, } from 'antd';

const warning = (description) => {
    antd_notification['warning']({
        message: `Warning`,
        description
    });
};

const error = (description) => {
    antd_notification['error']({
        message: `Error`,
        description
    });
};

const success = (description) => {
    antd_notification['success']({
        message: `Success`,
        description
    });
};

export {warning, error, success}
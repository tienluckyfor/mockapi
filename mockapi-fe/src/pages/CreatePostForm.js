import { CheckCircleOutlined, InboxOutlined } from '@ant-design/icons';
import { Button, Form, Input, message, Upload } from 'antd';
import React from 'react';
// import { useTranslation } from 'react-i18next';
import { useDispatch, useSelector } from 'react-redux';

// import { selectFormData } from './redux/slice';

const formItemLayout = {
    labelCol: {
        xs: { span: 24 },
        sm: { span: 4 },
    },
    wrapperCol: {
        xs: { span: 24 },
        sm: { span: 20 },
    },
};
const normFile = e => {
    if (Array.isArray(e)) {
        return e;
    }
    return e && e.fileList;
};

export default  function CreatePostForm() {
    // const { t } = useTranslation();
    const dispatch = useDispatch();
    // const { loading, error } = useSelector(selectFormData);
    // React.useEffect(() => {
    //     // if (error) {
    //     //     if (typeof error.message === 'string') {
    //     //         message.error({
    //     //             content: t(error.message),
    //     //             duration: 7,
    //     //         });
    //     //     } else {
    //     //         for (const errorMessage in error.message) {
    //     //             message.error({
    //     //                 content: t(errorMessage),
    //     //                 duration: 7,
    //     //             });
    //     //         }
    //     //     }
    //     // }
    // }, [error, t]);

    const [form] = Form.useForm();
    const onFinish = values => {
        // const {
        //     avatar,
        //     melliCardScanBack,
        //     melliCardScanFront,
        //     payrollScan,
        //     ...rest
        // } = values;
        //
        // const payload = {
        //     ...rest,
        //     avatarId: avatar ? avatar[avatar.length - 1].response.id : undefined,
        //     melliCardScanFrontId: melliCardScanFront
        //         ? melliCardScanFront[melliCardScanFront.length - 1].response.id
        //         : undefined,
        //     melliCardScanBackId: melliCardScanBack
        //         ? melliCardScanBack[melliCardScanBack.length - 1].response.id
        //         : undefined,
        //     payrollScanId: payrollScan
        //         ? payrollScan[payrollScan.length - 1].response.id
        //         : undefined,
        // };
        //
        // dispatch(actions.create({ data: payload, clearFn: form.resetFields }));
    };

    // const { form: UsersTranslations } = translations.pages.users.newTab;
    return (
        <Form
            {...formItemLayout}
            name="newUser"
            form={form}
            onFinish={onFinish}
            scrollToFirstError
        >
            <Form.Item label={`avatar`}>
                <Form.Item
                    name="avatar"
                    valuePropName="attachment"
                    getValueFromEvent={normFile}
                    noStyle
                >
                    <Upload.Dragger
                        name="file"
                        // headers={{ Authorization: getBearerToken() }}
                        action={'https://raw.githubusercontent.com/electather'}
                        // action={process.env.REACT_APP_BASE_URL + 'file'}
                    >
                        <p className="ant-upload-drag-icon">
                            <InboxOutlined />
                        </p>
                        <p className="ant-upload-text">
                            guide
                        </p>
                        <p className="ant-upload-hint">
                            help
                        </p>
                    </Upload.Dragger>
                </Form.Item>
            </Form.Item>
            <Form.Item wrapperCol={{ offset: 4 }}>
                <Button
                    type="primary"
                    htmlType="submit"
                    icon={<CheckCircleOutlined />}
                    // loading={loading}
                >
                    submit
                </Button>
            </Form.Item>
        </Form>
    );
}
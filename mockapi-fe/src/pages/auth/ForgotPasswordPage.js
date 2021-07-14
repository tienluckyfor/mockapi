import {Form, Input, Button, Modal} from "antd";
import {CheckCircleOutlined} from '@ant-design/icons';
import {useDispatch, useSelector} from "react-redux";
import {authForgotPassword, authsSelector} from "slices/auths";
import {Link, useHistory} from "react-router-dom";
import AuthLayout from "pages/layouts/AuthLayout";
import {error, getURLParams, objToUrlParams,} from "services";
import {useEffect} from "react";

const ForgotPasswordPage = () => {
    const dispatch = useDispatch()
    const {foAuth} = useSelector(authsSelector)
    const {ref} = getURLParams()
    const history = useHistory();

    useEffect(() => {
        if(!foAuth?.data) return;
        if (foAuth?.data?.status === 'EMAIL_SENT') {
            Modal.confirm({
                title: 'Success',
                icon: <CheckCircleOutlined />,
                content: foAuth?.data?.message,
                cancelButtonProps:{style: {display: 'none'}},
                onOk() {
                    let values = form.getFieldsValue()
                    const url = objToUrlParams({...values, ref})
                    history.push(`/ResetPasswordPage?${url}`)
                },
            });
            return;
        }
        error(foAuth?.data?.message)
    }, [foAuth])

    const [form] = Form.useForm()
    return (
        <AuthLayout
            onBack={() => history.goBack()}
            title="Forgot Password"
        >
            <Form
                form={form}
                onFinish={(values) => dispatch(authForgotPassword({...values, ref}))}
                layout={`vertical`}
            >
                <Form.Item
                    label="Email"
                    name="email"
                    rules={[{
                        required: true,
                        type: "email",
                        message: 'The email is not valid.'
                    }]}
                >
                    <Input/>
                </Form.Item>
                <Button
                    block
                    type="primary"
                    htmlType="submit"
                    loading={foAuth.isLoading}
                >Submit</Button>
            </Form>
        </AuthLayout>
    );
}
export default ForgotPasswordPage
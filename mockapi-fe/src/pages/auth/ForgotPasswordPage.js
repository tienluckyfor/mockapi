import {Form, Input, Button, PageHeader} from "antd";
import {useDispatch, useSelector} from "react-redux";
import {authRegister, authsSelector} from "slices/auths";
import {Link, useHistory} from "react-router-dom";
import AuthLayout from "pages/layouts/AuthLayout";
import {getURLParams} from "services";

const ForgotPasswordPage = () => {
    const dispatch = useDispatch()
    const {rAuth} = useSelector(authsSelector)
    const {ref} = getURLParams()
    const history = useHistory();

    return (
        <AuthLayout
            onBack={() => history.goBack()}
            title="Forgot Password"
        >
            <Form
                initialValues={{remember: true}}
                onFinish={(values) => dispatch(authRegister({...values, ref}))}
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
                    loading={rAuth.isLoading}
                >Submit</Button>
            </Form>
        </AuthLayout>
    );
}
export default ForgotPasswordPage
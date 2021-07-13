import {Form, Input, Button, Divider, PageHeader} from "antd";
import {useDispatch, useSelector} from "react-redux";
import {authRegister, authsSelector} from "slices/auths";
import {Link, useHistory} from "react-router-dom";
import AuthLayout from "pages/layouts/AuthLayout";
import {getURLParams} from "services";

const RegisterPage = () => {
    const dispatch = useDispatch()
    const {rAuth} = useSelector(authsSelector)
    const {ref} = getURLParams()
    const history = useHistory();

    return (
        <AuthLayout
            onBack={() => history.goBack()}
            title="Register"
            linkButton={<Link to={`/LoginPage?ref=${ref}`}>
                <Button block className={`-mt-4`} type="dashed">
                    <p className="truncate space-x-2">
                        <span className="lg:inline hidden">Already have an account?</span>
                        <span className={`text-indigo-700`}>Login Now</span>
                    </p>
                </Button>
            </Link>}
        >
            <Form
                initialValues={{remember: true}}
                onFinish={(values) => dispatch(authRegister({...values, ref}))}
                layout={`vertical`}
            >
                <Form.Item
                    label="Name"
                    name="name"
                    rules={[{
                        required: true,
                        message: 'The name is required.'
                    }]}
                >
                    <Input/>
                </Form.Item>
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
                <Form.Item
                    label="Password"
                    name="password"
                    rules={[{required: true, message: 'Please input your Password.'}]}
                >
                    <Input.Password/>
                </Form.Item>
                <Form.Item
                    label="Confirm Password"
                    name="password_confirmation"
                    dependencies={['password']}
                    hasFeedback
                    rules={[
                        {
                            required: true,
                            message: 'Please confirm your password!',
                        },
                        ({getFieldValue}) => ({
                            validator(_, value) {
                                if (!value || getFieldValue('password') === value) {
                                    return Promise.resolve();
                                }
                                return Promise.reject(new Error('The two passwords that you entered do not match!'));
                            },
                        }),
                    ]}
                >
                    <Input.Password/>
                </Form.Item>
                <Button
                    block
                    type="primary"
                    htmlType="submit"
                    loading={rAuth.isLoading}
                >Create Account</Button>
            </Form>
        </AuthLayout>
    );
}
export default RegisterPage
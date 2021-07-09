import {Form, Input, Button, Divider} from "antd";
import {useDispatch, useSelector} from "react-redux";
import {authRegister, authsSelector} from "slices/auths";
import {Link} from "react-router-dom";

const RegisterPage = () => {
    const dispatch = useDispatch()
    const {rAuth} = useSelector(authsSelector)

    const onFinishFailed = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };

    const renderMain = () => {
        return (
            <Form
                className="mx-auto max-w-sm border border-indigo-200 py-5 shadow-lg relative"
                initialValues={{remember: true}}
                onFinish={(values) => dispatch(authRegister(values))}
                onFinishFailed={onFinishFailed}
                layout={`vertical`}
            >
                <section className="px-5 ">
                    <h2 className="text-2xl font-semibold">Register</h2>
                    <Form.Item
                        className="mt-3"
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
                        className="mt-3"
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
                        className="mt-3"
                        label="Password"
                        name="password"
                        rules={[{required: true, message: 'Please input your Password.'}]}
                    >
                        <Input.Password/>
                    </Form.Item>
                    <Form.Item
                        className="mt-3"
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
                    <div className="flex items-center justify-between mt-3 ">
                        <Button
                            block
                            type="primary"
                            htmlType="submit"
                            loading={rAuth.isLoading}
                        >Create Account</Button>
                    </div>
                </section>
                <Divider plain/>
                <section className="px-5 ">
                    <Link to={`/LoginPage`}>
                        <Button block className={`-mt-4`} link={`/LoginPage`} type="dashed">
                            Already have an account? <span className={`text-indigo-700 ml-2`}>Login Now</span>
                        </Button>
                    </Link>
                    <div className="flex items-center justify-between mt-4 ">
                        <Button className="w-1/2 mr-2">Facebook</Button>
                        <Button className="w-1/2 ml-2">Google</Button>
                    </div>
                </section>
            </Form>
        )
    }
    return (
        <section className="pt-20">
            {renderMain()}
        </section>
    );
}
export default RegisterPage
import {Form, Input, Button, Divider} from "antd";
import {useDispatch, useSelector} from "react-redux";
import {authLogin, authsSelector} from "slices/auths";
import {Link} from 'react-router-dom'

const LoginPage = () => {
    const dispatch = useDispatch()
    const {lAuth} = useSelector(authsSelector)

    const onFinishFailed = (errorInfo) => {
        console.log('Failed:', errorInfo);
    };

    const renderMain = () => {
        return (
            <Form
                className="mx-auto max-w-sm border border-indigo-200 py-5 shadow-lg relative"
                initialValues={{remember: true}}
                onFinish={(values) => dispatch(authLogin(values))}
                onFinishFailed={onFinishFailed}
                layout={`vertical`}
            >
                <section className="px-5">
                    <h2 className="text-2xl font-semibold">Login</h2>
                    <Form.Item
                        className="mt-3"
                        label="Email"
                        name="username"
                        rules={[{
                            required: true,
                            type: "email",
                            message: 'The email is not valid.'
                        }]}
                    >
                        <Input type={`email`}/>
                    </Form.Item>
                    <Form.Item
                        className="mt-3"
                        label="Password"
                        name="password"
                        rules={[{required: true, message: 'Please input your Password.'}]}
                    >
                        <Input.Password/>
                    </Form.Item>
                    <div className="flex items-center justify-between mt-3 ">
                        <Button
                            block
                            type="primary"
                            htmlType="submit"
                            loading={lAuth.isLoading}
                        >Sign in</Button>
                    </div>
                </section>
                <Divider plain/>
                <section className="px-5 ">
                    <Link to="/RegisterPage">
                    <Button block className={`-mt-4`} type="dashed">
                        Don't have an account? <span className={`text-indigo-700 ml-2`}>Create a Free Account</span>
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
export default LoginPage
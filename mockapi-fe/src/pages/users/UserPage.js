import {Button, Form, Input, Space, Checkbox, Image, PageHeader, Menu} from 'antd';
import React, {useEffect} from 'react';
import {MediaModal} from "components";
import {mediaSelector, myMediaList, setMediaMerge} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import {useDispatch, useSelector} from "react-redux";
import {editUser, queryMe, usersSelector} from "slices/users";
import UserLayout from "pages/layouts/UserLayout";

const UserPage = () => {
    const {qMe} = useSelector(usersSelector)
    const dispatch = useDispatch()
    const {mlMedia, mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)
    const {eUser,} = useSelector(usersSelector)

    useEffect(() => {
        dispatch(myMediaList())
    }, []);

    const [form] = Form.useForm()
    useEffect(() => {
        if (!qMe.isLoading) {
            form.setFieldsValue(qMe?.data)
            dispatch(setCommonMerge('checkedList', {[name]: [qMe?.data?.medium?.id]}))
        }
    }, [qMe]);

    useEffect(() => {
        if (eUser.status)
            dispatch(queryMe())
    }, [eUser]);

    useEffect(() => {
        // media
        const fmedia = {[name]: {name}};
        let fieldsValue = form.getFieldsValue()
        for (const key in fmedia) {
            const f = fmedia[key]
            const mediaR = (mlMedia.data ?? []).filter((medium) => checkedList[f.name] && checkedList[f.name].indexOf(medium.id) !== -1)
            dispatch(setMediaMerge('cbMedia', {[f.name]: mediaR}))
            fieldsValue[f.name] = mediaR.map((medium) => medium.id)
        }
        form.setFieldsValue(fieldsValue);
    }, [mlMedia, checkedList]);

    const name = 'avatar';
    /*
    const RenderForm = () => {
        return (
            <Form
                form={form}
                layout={`vertical`}
                onFinish={(values) => dispatch(editUser(values))}
                className="mt-4 rounded-sm"
            >
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
                <MediaModal/>
                <Form.Item
                    name={name}
                    label={<span className="capitalize">{name}</span>}
                >
                    <section className="flex flex-col space-y-3">
                        <Button
                            className="w-36"
                            onClick={() => dispatch(setMediaMerge('mMedia', {
                                visible: !mMedia?.visible,
                                name
                            }))}
                        >Choose media</Button>
                        {cbMedia[name]?.length !== 0 &&
                        <div>
                            <Space size={[10, 10]} wrap>
                                {(cbMedia[name] ?? []).map((medium, key) => (
                                    <div className={`relative border border-gray-300 p-1`}
                                         style={{width: 104, height: 104}}>
                                        <Checkbox
                                            onChange={() => {
                                                const checkedList1 = checkedList[name].filter((item) => item != medium.id)
                                                dispatch(setCommonMerge('checkedList', {[name]: checkedList1}))
                                            }}
                                            value={medium.id}
                                            checked
                                            className={`absolute z-10 left-0 top-0 ml-1 mt-1 m-0 px-1 bg-white rounded`}/>
                                        <Image
                                            preview={false}
                                            height={90}
                                            width={90}
                                            style={{objectFit: "cover"}}
                                            src={medium.thumb_image}
                                        />
                                    </div>
                                ))}
                            </Space>
                        </div>
                        }
                    </section>
                </Form.Item>

                <div className="flex items-center justify-end mt-3 ">
                    {/!*<Button onClick={() => history.push(`/`)}>
                        Cancel
                    </Button>*!/}
                    <Button
                        className="ml-3"
                        type="primary"
                        htmlType="submit"
                        loading={eUser.isLoading}
                    >
                        Submit
                    </Button>
                </div>
            </Form>
        );
    }
*/
    return (
        <UserLayout>
            <Form
                form={form}
                layout={`vertical`}
                onFinish={(values) => dispatch(editUser(values))}
                className="mt-4 rounded-sm"
            >
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
                <MediaModal/>
                <Form.Item
                    name={name}
                    label={<span className="capitalize">{name}</span>}
                >
                    <section className="flex flex-col space-y-3">
                        <Button
                            className="w-36"
                            onClick={() => dispatch(setMediaMerge('mMedia', {
                                visible: !mMedia?.visible,
                                name
                            }))}
                        >Choose media</Button>
                        {cbMedia[name]?.length !== 0 &&
                        <div>
                            <Space size={[10, 10]} wrap>
                                {(cbMedia[name] ?? []).map((medium, key) => (
                                    <div className={`relative border border-gray-300 p-1`}
                                         style={{width: 104, height: 104}}>
                                        <Checkbox
                                            onChange={() => {
                                                const checkedList1 = checkedList[name].filter((item) => item != medium.id)
                                                dispatch(setCommonMerge('checkedList', {[name]: checkedList1}))
                                            }}
                                            value={medium.id}
                                            checked
                                            className={`absolute z-10 left-0 top-0 ml-1 mt-1 m-0 px-1 bg-white rounded`}/>
                                        <Image
                                            preview={false}
                                            height={90}
                                            width={90}
                                            style={{objectFit: "cover"}}
                                            src={medium.thumb_image}
                                        />
                                    </div>
                                ))}
                            </Space>
                        </div>
                        }
                    </section>
                </Form.Item>

                <div className="flex items-center justify-end mt-3 ">
                    <Button
                        className="ml-3"
                        type="primary"
                        htmlType="submit"
                        loading={eUser.isLoading}
                    >
                        Submit
                    </Button>
                </div>
            </Form>
        </UserLayout>
    )
}
export default UserPage

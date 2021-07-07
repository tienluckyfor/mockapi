import {
    Button,
    Form,
    Input,
    Space,
    Checkbox, Image
} from 'antd';
import React, {useEffect} from 'react';
import {MediaModal} from "components";
import {mediaSelector, myMediaList, setMediaMerge} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import {useDispatch, useSelector} from "react-redux";
import {editUser, queryMe, usersSelector} from "slices/users";

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
    form.setFieldsValue(qMe?.data)
    useEffect(() => {
        const checkedList1 = (qMe?.data?.media ?? []).map((item) => item.id)
        dispatch(setCommonMerge('checkedList', {[name]: checkedList1}))
    }, [qMe]);

    useEffect(() => {
        if (eUser.status)
            dispatch(queryMe())
    }, [eUser]);

    useEffect(() => {
        // media
        const fmedia = {[name]: {name}};
        let fieldsValue = form.getFieldsValue()
        console.log('fmedia', fmedia)
        for (const key in fmedia) {
            const f = fmedia[key]
            console.log('mlMedia.data', mlMedia.data)
            const mediaR = (mlMedia.data ?? []).filter((medium) => checkedList[f.name] && checkedList[f.name].indexOf(medium.id) !== -1)
            console.log('mediaR', mediaR)
            dispatch(setMediaMerge('cbMedia', {[f.name]: mediaR}))
            fieldsValue[f.name] = mediaR.map((medium) => medium.id)
        }
        console.log('fieldsValue', fieldsValue)
        // console.log('fieldsValue', fieldsValue)
        form.setFieldsValue(fieldsValue);
    }, [mlMedia, checkedList]);

    const name = 'avatar';
    return (
        <>
            <div className="flex items-center space-x-2">
                <h1 className="text-2xl capitalize">Hi <span className="text-gray-500">{qMe?.data?.name}</span>!</h1>
            </div>
            <Form
                form={form}
                layout={`vertical`}
                onFinish={(values) => dispatch(editUser(values))}
                className="border border-indigo-200 p-4 mt-4 rounded-sm"
                // className="py-4 mt-4 rounded-sm"
            >
                <Form.Item
                    name="name"
                    label="Name"
                    rules={[{required: true}]}
                >
                    <Input/>
                </Form.Item>
                <Form.Item
                    name="email"
                    label="Email"
                    rules={[{required: true}]}
                >
                    <Input/>
                </Form.Item>
                <Form.Item
                    name="password"
                    label="Password"
                >
                    <Input.Password/>
                </Form.Item>
                <Form.Item
                    name="password_confirmation"
                    label="Re-password"
                >
                    <Input.Password/>
                </Form.Item>
                {/*<Form.Item
                    name="email"
                    label="Re-password"
                    rules={[{ required: true}]}
                >
                    <Button icon={<UploadOutlined />}>Click to Upload</Button>
                </Form.Item>*/}
                {/*<Upload plainOptions={[]}>
                    <Button icon={<UploadOutlined/>}>Upload Avatar</Button>
                </Upload>*/}
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
                                                console.log('checkedList1', checkedList1)
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
                        // onClick={(e) => dispatch(setApiMerge(`cApi`, {isOpen: false}))}
                    >
                        Cancel
                    </Button>
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
            {/*Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aperiam blanditiis consectetur culpa ea est, fuga illum, in iusto laudantium minus, nihil non nulla provident quia quod similique velit.*/}
        </>
    );
}
export default UserPage

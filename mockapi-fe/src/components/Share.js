import {Button, Popconfirm, Form, List, Select, Space} from "antd";
import {PlusOutlined, DeleteOutlined} from '@ant-design/icons';
import React, {useState} from "react";
import Avatar from "react-avatar";
import {queryMe, shareSearchUsers, usersSelector} from "slices/users";
import {createShare, deleteShare, shareList, sharesSelector} from "slices/shares";
import {useDispatch, useSelector} from "react-redux";
import debounce from "lodash/debounce"
import moment from "moment"
import "moment-timezone";
import {datasetsSelector} from "slices/datasets";

export const Share = ({shareable_type, shareable_id}) => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {lsUser} = useSelector(usersSelector)
    const {cShare, lShare, dShare} = useSelector(sharesSelector)
    const {modalDataset,} = useSelector(datasetsSelector)
    const {qMe,} = useSelector(usersSelector)

    const [isOwner, setIsOwner] = useState()
    React.useEffect(() => {
        const isOwner = qMe?.data?.id == modalDataset?.dataset?.user?.id
        setIsOwner(isOwner)
    }, [qMe, modalDataset])

    const RenderForm = () => {
        const debounceFetch = debounce(name => {
            dispatch(shareSearchUsers(shareable_type, shareable_id, name))
        }, 500);

        React.useEffect(() => {
            console.log('cShare', cShare)
            if (cShare?.data) {
                form.setFieldsValue({user_invite_id: null});
            }
        }, [cShare])

        React.useEffect(() => {
            if (lShare.isRefresh && shareable_id) {
                dispatch(queryMe())
                dispatch(shareList(shareable_type, shareable_id))
            }
        }, [lShare, shareable_id])

        React.useEffect(() => {
            if (shareable_id)
                dispatch(shareList(shareable_type, shareable_id))
        }, [shareable_id])

        const [form] = Form.useForm()
        form.setFieldsValue({
            shareable_type,
            shareable_id,
        })

        return (
            <Form
                form={form}
                onFinish={(values) => dispatch(createShare(values))}
                layout="inline"
                className={isOwner ? '' : 'hidden'}
            >
                <Form.Item name="user_invite_id" style={{width: "89.5%"}}>
                    <Select
                        showSearch
                        filterOption={false}
                        onSearch={(value) => {
                            debounceFetch(value)
                        }}
                        notFoundContent={null}
                        placeholder="Share to..."
                        allowClear={true}
                    >
                        {(lsUser?.data?.share_search_users ?? []).map((user) =>
                            <Select.Option key={user.id}>
                                <Space>
                                    <Avatar
                                        className="rounded-full"
                                        size="20"
                                        name={user.name}
                                        src={user?.medium?.thumb_image}
                                    />
                                    {user.name}
                                </Space>
                            </Select.Option>
                        )}
                    </Select>
                </Form.Item>
                <Form.Item style={{marginRight: 0}}>
                    <Button
                        type="primary"
                        htmlType="submit"
                        icon={<PlusOutlined/>}
                        loading={cShare.isLoading}
                    />
                </Form.Item>
                <Form.Item hidden={true} name="shareable_type"/>
                <Form.Item hidden={true} name="shareable_id"/>
            </Form>
        )
    }

    const RenderList = () => {
        return (
            <List
                loading={lShare.isLoading}
                dataSource={(lShare?.data?.shares ?? [])}
                renderItem={({id, is_owner, user_invite, updated_at}) => (
                    <List.Item>
                        <section className="flex justify-between w-full">
                            <Space>
                                <Avatar
                                    className="rounded-full"
                                    size="20"
                                    name={user_invite.name}
                                    src={user_invite?.medium?.thumb_image}
                                />

                                {is_owner &&
                                <span className="text-indigo-600">{user_invite.name}</span>
                                }
                                {!is_owner && user_invite.name}
                            </Space>
                            <Space>
                                {is_owner &&
                                <span className="text-indigo-600">Owner</span>
                                }
                                {!is_owner &&
                                <span className="text-gray-400">{moment(updated_at).fromNow()}</span>
                                }
                                { isOwner && !is_owner &&
                                <Popconfirm
                                    title="Are you sure to delete?"
                                    onConfirm={() => dispatch(deleteShare(id))}
                                    okButtonProps={{autoFocus: true}}
                                >
                                    <Button
                                        type="dashed"
                                        danger
                                        icon={<DeleteOutlined/>}
                                        loading={dShare.isLoading && dShare.id === id}
                                    />
                                </Popconfirm>
                                }

                            </Space>
                        </section>
                    </List.Item>
                )}
            />
        )
    }

    return (
        <section className="">
            {RenderForm()}
            {RenderList()}
        </section>
    )
}
import {Button, Popconfirm, Form, List, Select, Space} from "antd";
import {PlusOutlined, DeleteOutlined} from '@ant-design/icons';
import React, {useEffect, useState} from "react";
import Avatar from "react-avatar";
import {queryMe, shareSearchUsers, usersSelector} from "slices/users";
import {createShare, deleteShare, shareList, sharesSelector} from "slices/shares";
import {useDispatch, useSelector} from "react-redux";
import debounce from "lodash/debounce"
import moment from "moment"
import "moment-timezone";
import {isMobile} from 'react-device-detect';
import {getFirstThumb} from "services";
import {listApi} from "../slices/apis";
import {myDatasetList} from "../slices/datasets";

export const Share = ({shareable_type, shareable_id, data}) => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)
    const dispatch = useDispatch()
    const {lsUser} = useSelector(usersSelector)
    const {cShare, lShare, dShare} = useSelector(sharesSelector)
    const {qMe,} = useSelector(usersSelector)

    const [isOwner, setIsOwner] = useState()
    React.useEffect(() => {
        const isOwner = qMe?.data?.id == data?.user?.id
        setIsOwner(isOwner)
    }, [qMe, data])

    const RenderForm = () => {
        const debounceFetch = debounce(name => {
            dispatch(shareSearchUsers(shareable_type, shareable_id, name))
        }, 500);
        const [form] = Form.useForm()

        useEffect(() => {
            if (cShare.data) {
                form.setFieldsValue({user_invite_id: null});
            }
        }, [cShare, form])

        useEffect(() => {
            if (cShare.data || dShare.status) {
                if (shareable_type.match(/Api/gi))
                    dispatch(listApi())
                if (shareable_type.match(/Dataset/gi))
                    dispatch(myDatasetList())
            }
        }, [cShare, dShare, dispatch, shareable_type])

        useEffect(() => {
            if (lShare.isRefresh && shareable_id) {
                dispatch(queryMe())
                dispatch(shareList(shareable_type, shareable_id))
            }
        }, [lShare, shareable_id, dispatch, shareable_type])

        useEffect(() => {
            if (shareable_id)
                dispatch(shareList(shareable_type, shareable_id))
        }, [shareable_id, dispatch])

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
                <Form.Item name="user_invite_id" style={{width: isMobile ? '80%' : '89.5%'}}>
                    <Select
                        showSearch
                        filterOption={false}
                        onSearch={(value) => debounceFetch(value)}
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
                                        src={getFirstThumb(user?.medium)}
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
        console.log('lShare?.data?.shares', lShare?.data?.shares)
        return (
            <List
                loading={lShare.isLoading}
                dataSource={lShare?.data?.shares ?? []}
                renderItem={({id, is_owner, user_invite, updated_at}) => (
                    <List.Item>
                        <section className="flex justify-between w-full">
                            <Space>
                                <Avatar
                                    className="rounded-full"
                                    size="20"
                                    name={user_invite.name}
                                    // src={user_invite?.medium?.thumb_image}
                                    src={getFirstThumb(user_invite?.medium)}
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
                                {isOwner && !is_owner &&
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
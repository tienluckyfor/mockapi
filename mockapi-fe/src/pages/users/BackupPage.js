import {Table, Button, Input, Form, Menu, Popconfirm, Dropdown} from "antd";
import {MoreOutlined,} from '@ant-design/icons'
import React, {useEffect, useState} from "react";
import UserLayout from "pages/layouts/UserLayout";
import moment from "moment";
import "moment-timezone"
import {useDispatch, useSelector} from "react-redux";
import {BackupImportList, BackupProcess, backupsSelector, BackupTake} from "slices/backups";
import {commonsSelector, handleMenuClick, handleVisibleChange} from "slices/commons";

const BackupPage = () => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {visibles} = useSelector(commonsSelector)
    const {ilBackup, tBackup, pBackup} = useSelector(backupsSelector)

    useEffect(() => {
        dispatch(BackupImportList())
    }, [])

    useEffect(() => {
        if (ilBackup.isRefresh)
            dispatch(BackupImportList())
    }, [ilBackup])

    const RenderForm = () => {
        return <Form
            layout={`vertical`}
            onFinish={(values) => dispatch(BackupTake(values))}
            initialValues={{
                export_url: 'https://be.mockapi.codeby.com/api/backup/export',
            }}
        >
            <Form.Item
                name="export_url"
                label="Export url"
                rules={[{required: true,}]}>
                <Input/>
            </Form.Item>
            <div className="flex items-center justify-end mt-3 ">
                <Button type="primary" htmlType="submit"
                        loading={tBackup.isLoading}>
                    Take
                </Button>
            </div>
        </Form>
    }
    const RenderTable = () => {
        const menu = (datum) => (
            <Menu onClick={(e) => dispatch(handleMenuClick(e, datum))}>
                <Menu.Item key={`delete`}>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) =>
                            dispatch(BackupProcess({fName: datum.name, process: 'databases'}))}
                        loading={pBackup.isLoading && pBackup?.datum?.process === 'databases'}
                    >
                        Databases
                    </Button>
                </Menu.Item>
                <Menu.Item key={`delete`}>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) =>
                            dispatch(BackupProcess({fName: datum.name, process: 'files'}))}
                        loading={pBackup.isLoading && pBackup?.datum?.process === 'files'}
                    >
                        Files
                    </Button>
                </Menu.Item>
                <Menu.Item key={`delete`}>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) =>
                            dispatch(BackupProcess({fName: datum.name, process: 'databases_files'}))}
                        loading={pBackup.isLoading && pBackup?.datum?.process === 'databases_files'}
                    >
                        Databases & Files
                    </Button>
                </Menu.Item>
                <Menu.Item key={`delete`}>
                    <Button
                        danger
                        size={`small`}
                        type="link"
                        onClick={(e) =>
                            window.location.assign(`${process.env.REACT_APP_URL}/storage/imports/${datum.name}`)
                        }
                    >
                        Download
                    </Button>
                </Menu.Item>
            </Menu>
        )
        const columns = [
            {
                title: 'Name',
                dataIndex: 'name',
            },
            {
                title: 'Size',
                dataIndex: 'size',
            },
            {
                title: 'Date',
                dataIndex: 'date',
                render: (text, datum, index) => {
                    return moment(text).fromNow()
                }
            },
            {
                title: 'Action',
                ellipsis: true,
                width: '10%',
                render: (text, datum, index) => {
                    return <Dropdown
                        overlay={menu(datum)}
                        arrow
                        visible={visibles[datum.id]}
                        onVisibleChange={(flag) => dispatch(handleVisibleChange(flag, datum))}
                    >
                        <Button type="link" icon={<MoreOutlined/>} className={`bg-gray-100`}/>
                    </Dropdown>
                }
            },
        ];
        return <Table
            loading={ilBackup.isLoading}
            columns={columns}
            dataSource={ilBackup?.data}
            pagination={{pageSize: 20, hideOnSinglePage: true}}
        />
    }

    return (
        <UserLayout>
            <div className="space-y-5 pt-5">
                {RenderForm()}
                {RenderTable()}
            </div>
        </UserLayout>
    )
}

export default BackupPage
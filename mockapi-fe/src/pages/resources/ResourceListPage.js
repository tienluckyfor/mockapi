import {Tooltip, Button, Divider, Popconfirm, Table, Dropdown, Menu, Tree} from 'antd';
import {MoreOutlined, DownOutlined} from '@ant-design/icons'
import {useEffect} from 'react';
import moment from "moment"
import "moment-timezone";
import {useDispatch, useSelector} from "react-redux";

import {
    resourcesSelector,
    editResource,
    deleteResource,
    duplicateResource,
    myResourceList,
    setResourceMerge,
    editParentResource,
} from "slices/resources";
import {commonsSelector, handleMenuClick, handleVisibleChange} from "slices/commons";
import {queryMe} from "slices/users";

import {Header, Loading} from "components";
import EditParentResourceForm from "./EditParentResourceForm";
import CreateResourceForm from "./CreateResourceForm";
import EditResourceForm from "./EditResourceForm";
import AppHelmet from "shared/AppHelmet";

const ResourceListPage = () => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {visibles} = useSelector(commonsSelector)
    const {cResource, eResource, mlResource, dResource, duResource, epResource} = useSelector(resourcesSelector)

    useEffect(() => {
        if (mlResource.isRefresh) {
            dispatch(myResourceList())
            dispatch(queryMe(window.location.href))
        }
    }, [dispatch, mlResource])

    const renderTable = () => {
        const menu = (resource) => (
            <Menu onClick={(e) => dispatch(handleMenuClick(e, resource))}>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(setResourceMerge(`epResource`, {isOpen: true, resource}))}
                    >
                        Parent
                    </Button>
                </Menu.Item>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(duplicateResource(resource))}
                        loading={duResource.isLoading && duResource?.resource?.id === resource.id}
                    >
                        Duplicate
                    </Button>
                </Menu.Item>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(setResourceMerge(`eResource`, {isOpen: true, resource}))}
                    >
                        Edit
                    </Button>
                </Menu.Item>
                <Menu.Item key={`delete`}>
                    <Popconfirm
                        title={`Delete resource: ${resource.name}`}
                        onConfirm={(e) => dispatch(deleteResource(resource))}
                        okText="Yes"
                        cancelText="No"
                    >
                        <Button
                            size={`small`}
                            type="link"
                            danger
                            loading={dResource?.resource?.id === resource.id}
                        >Delete</Button>
                    </Popconfirm>
                </Menu.Item>
            </Menu>
        )
        const columns = [
            {
                title: 'Api',
                dataIndex: 'api',
                ellipsis: true,
                render: (text, resource, index) => {
                    const api = mlResource?.data?.apis[resource.api_id]
                    const resources = mlResource?.data?.resources.filter((resource) => resource.api_id === api.id)
                    const obj = {
                        children: <Tooltip title={api.name}>
                            <p className={`text-gray-400`}>{api.name}</p>
                        </Tooltip>,
                        props: {
                            rowSpan: resources[0] && resources[0]?.id === resource.id ? api.count : 0,
                        },
                    }
                    return obj
                },
            },
            {
                title: 'Resource',
                dataIndex: 'name',
                ellipsis: true,
                width: '30%',
                sorter: (a, b) => a.name.localeCompare(b.name),
                render: (text, resource, index) => {
                    const resources = (mlResource?.data?.resources ?? []).filter((item) => (item?.parents ?? []).indexOf(resource?.id) !== -1)
                    if (resources.length === 0) {
                        return (
                            <Tooltip title={resource.name}>
                                <p className="truncate w-48">{resource.name}</p>
                            </Tooltip>
                        )
                    }
                    return (
                        <Tree
                            showLine={{showLeafIcon: false}}
                            defaultExpandAll
                            blockNode
                            switcherIcon={<DownOutlined className={`hidden opacity-0`}/>}
                            className={`-ml-7 bg-transparent`}
                            treeData={[
                                {
                                    title:
                                        <Tooltip title={resource.name}>
                                            <p className="truncate w-48">{resource.name}</p>
                                        </Tooltip>,
                                    children: resources.map((item) => {
                                        return {title: <p className="truncate text-gray-400 w-40 ">{item.name}</p>}
                                    }),
                                },
                            ]}
                        />
                    )
                }
            },
            {
                title: 'Field',
                dataIndex: 'field',
                sorter: (a, b) => a.field - b.field,
                render: (text, resource, index) => {
                    return `${resource.fields.length}`
                }
            },
            {
                title: 'Endpoint',
                dataIndex: 'endpoint',
                sorter: (a, b) => a.field - b.field,
                render: (text, resource, index) => {
                    const endpoints = resource.endpoints.filter((endpoint) => endpoint.status)
                    return `${endpoints.length}`
                }
            },
            {
                title: 'Last updated',
                ellipsis: true,
                render: (text, resource, index) => {
                    return <Tooltip title={resource.updated_at}>{moment(resource.updated_at).fromNow()}</Tooltip>
                }
            },
            {
                title: 'Action',
                ellipsis: true,
                width: '10%',
                render: (text, resource, index) => {
                    return <Dropdown
                        overlay={menu(resource)}
                        arrow
                        visible={visibles[resource.id]}
                        onVisibleChange={(flag) => dispatch(handleVisibleChange(flag, resource))}
                    >
                        <Button type="link" icon={<MoreOutlined/>} className={`bg-gray-100`}/>
                    </Dropdown>
                }
            },
        ]

        return (
            <>
                <Table
                    columns={columns}
                    dataSource={mlResource?.data?.resources}
                    pagination={{pageSize: 20, hideOnSinglePage: true}}
                />
            </>
        )
    }

    const renderMain = () => {
        return (
            <>
                <Header page={`ResourceListPage`}/>
                {cResource['isOpen'] &&
                <CreateResourceForm/>
                }
                {eResource.isOpen &&
                <EditResourceForm
                    visible={true}
                    onCreate={(values) => dispatch(editResource(values))}
                    onCancel={() => {
                        dispatch(setResourceMerge(`eResource`, {isOpen: false}))
                    }}
                />
                }
                {epResource.isOpen &&
                <EditParentResourceForm
                    visible={true}
                    onCreate={(values) => dispatch(editParentResource(values))}
                    onCancel={() => {
                        dispatch(setResourceMerge(`epResource`, {isOpen: false}))
                    }}
                />
                }
                {mlResource?.search?.name &&
                <h3 className="text-xl mt-3 text-gray-400">
                    {mlResource?.search?.total} results of search <span
                    className="bg-yellow-400 text-black px-1">{mlResource?.search?.name}</span>
                </h3>
                }
                <Divider className="mt-4 mb-0"/>
                {renderTable()}
            </>
        )
    }

    return (
        <>
            <AppHelmet title="Resource's list"/>
            {mlResource.isLoading && !mlResource.data &&
            <Loading/>
            }
            {!(mlResource.isLoading && !mlResource.data) &&
            renderMain()
            }
        </>
    );
}
export default ResourceListPage

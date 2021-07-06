import {Tooltip, Button, Divider, Popconfirm, Badge, Table, Dropdown, Menu, Modal, List} from 'antd';
import {MoreOutlined, CopyOutlined, CheckOutlined} from '@ant-design/icons';
import {useEffect, useState} from 'react';
import moment from "moment"
import {useDispatch, useSelector} from "react-redux"

import {
    datasetsSelector,
    editDataset,
    deleteDataset,
    duplicateDataset,
    myDatasetList,
    setDatasetMerge,
    setDataset,
} from "slices/datasets"
import {commonsSelector, handleMenuClick, handleVisibleChange, setCommon, setCommonMerge} from "slices/commons";
import {getMe} from "slices/auths"

import {Header, Loading} from "components"
import CreateDatasetForm from "./CreateDatasetForm"
import EditDatasetForm from "./EditDatasetForm"
import InfoDatasetModal from "./InfoDatasetModal";

const DatasetListPage = () => {
    const dispatch = useDispatch()
    const {visibles,} = useSelector(commonsSelector)
    const {cDataset, eDataset, mlDataset, dDataset, duDataset,} = useSelector(datasetsSelector)

    useEffect(() => {
        if (mlDataset.isRefresh) {
            dispatch(myDatasetList())
            dispatch(getMe(window.location.href))
        }
    }, [dispatch, mlDataset])

    const renderTable = () => {
        const menu = (dataset) => (
            <Menu onClick={(e) => dispatch(handleMenuClick(e, dataset))}>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(setDataset({modalDataset: {visible: true, dataset}}))}
                    >
                        Info
                    </Button>
                </Menu.Item>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(duplicateDataset(dataset))}
                        loading={duDataset.isLoading && duDataset?.dataset?.id === dataset.id}
                    >
                        Duplicate
                    </Button>
                </Menu.Item>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(setDatasetMerge(`eDataset`, {isOpen: true, dataset}))}
                    >
                        Edit
                    </Button>
                </Menu.Item>
                <Menu.Item key={`delete`}>
                    <Popconfirm
                        title={`Delete dataset: ${dataset.name}`}
                        onConfirm={(e) => dispatch(deleteDataset(dataset))}
                        okText="Yes"
                        cancelText="No"
                        okButtonProps={{autoFocus: true}}
                    >
                        <Button
                            size={`small`}
                            type="link"
                            danger
                            loading={dDataset?.dataset?.id === dataset.id}
                        >Delete</Button>
                    </Popconfirm>
                </Menu.Item>
            </Menu>
        )

        const columns = [
            {
                title: 'Name',
                dataIndex: 'name',
                width: '30%',
                render: (text, dataset, index) => <Tooltip title={dataset.name}>
                    <p className="truncate w-48">{dataset.name}</p>
                </Tooltip>
            },
            {
                title: 'Api',
                dataIndex: 'api',
                ellipsis: true,
                render: (text, dataset, index) => {
                    const api = mlDataset?.data?.apis[dataset?.api_id]
                    return (<Tooltip title={api?.name}>
                        <p className="text-gray-400">{api?.name}</p>
                    </Tooltip>)
                },
            },
            {
                title: 'Rally datas',
                dataIndex: 'rally_datas',
                render: (text, dataset, index) => {
                    const rallies = mlDataset?.data?.rallies[dataset?.id]
                    if (!rallies) return;
                    return (
                        <section className={`text-xs flex flex-col space-y-1`}>
                            {rallies.map((rally) => {
                                const resource = mlDataset?.data?.resources[rally?.resource_id]
                                return (<p className={`flex space-x-1 items-center`}>
                                        <span className="truncate ">{resource?.name}</span>
                                        <Badge count={rally.count} className="site-badge-count-4" size="small"/>
                                    </p>)
                            })}
                        </section>
                    )
                    return (<Tooltip title={dataset?.api?.name}>
                        <p className="text-gray-400">{dataset?.api?.name}</p>
                    </Tooltip>)
                },
            },
            {
                title: 'Last updated',
                ellipsis: true,
                render: (text, dataset, index) => {
                    return <Tooltip title={dataset.updated_at}>{moment(dataset.updated_at).fromNow()}</Tooltip>
                }
            },
            {
                title: 'Action',
                ellipsis: true,
                width: '10%',
                render: (text, dataset, index) => {
                    return <Dropdown
                        overlay={menu(dataset)}
                        arrow
                        visible={visibles[dataset.id]}
                        onVisibleChange={(flag) => dispatch(handleVisibleChange(flag, dataset))}
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
                    dataSource={mlDataset?.data?.datasets}
                    pagination={{pageSize: 20, hideOnSinglePage: true}}
                />
            </>
        )
    }

    const renderMain = () => {
        return (
            <>
                <Header page={`DatasetListPage`}/>
                {cDataset.isOpen &&
                <CreateDatasetForm/>
                }
                {eDataset.isOpen &&
                <EditDatasetForm
                    visible={true}
                    onCreate={(values) => dispatch(editDataset(values))}
                    onCancel={() => {
                        dispatch(setDatasetMerge(`eDataset`, {isOpen: false}))
                    }}
                />
                }
                {mlDataset?.search?.name &&
                <h3 className="text-xl mt-3 text-gray-400">
                    {mlDataset?.search?.total} results of search <span
                    className="bg-yellow-400 text-black px-1">{mlDataset?.search?.name}</span>
                </h3>
                }
                <Divider className="mt-4 mb-0"/>
                <InfoDatasetModal/>
                {renderTable()}
            </>
        )
    }

    return (
        <>
            {mlDataset.isLoading && !mlDataset.data &&
            <Loading/>
            }
            {!(mlDataset.isLoading && !mlDataset.data) &&
            renderMain()
            }
        </>
    );
}
export default DatasetListPage

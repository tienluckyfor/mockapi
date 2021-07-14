import {Tooltip, Button, Divider, Popconfirm, Badge, Table, Dropdown, Menu, } from 'antd';
import {MoreOutlined, } from '@ant-design/icons';
import {useEffect, } from 'react';
import moment from "moment"
import "moment-timezone"
import {useDispatch, useSelector} from "react-redux"

import {
    datasetsSelector,
    editDataset,
    deleteDataset,
    duplicateDataset,
    listDataset,
    setDatasetMerge,
    setDataset,
} from "slices/datasets"
import {commonsSelector, handleMenuClick, handleVisibleChange, } from "slices/commons";
import {queryMe} from "slices/users"

import {Header, Loading} from "components"
import CreateDatasetForm from "./CreateDatasetForm"
import EditDatasetForm from "./EditDatasetForm"
import InfoDatasetModal from "./InfoDatasetModal";
import AppHelmet from "shared/AppHelmet";

const DatasetListPage = () => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {visibles,} = useSelector(commonsSelector)
    const {cDataset, eDataset, lDataset, dDataset, duDataset,} = useSelector(datasetsSelector)

    useEffect(() => {
        if (lDataset.isRefresh) {
            dispatch(listDataset())
            dispatch(queryMe(window.location.href))
        }
    }, [dispatch, lDataset])

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
                    const {api} = dataset
                    return (<Tooltip title={api?.name}>
                        <p className="text-gray-400">{api?.name}</p>
                    </Tooltip>)
                },
            },
            {
                title: 'Rally datas',
                dataIndex: 'rally_datas',
                render: (text, dataset, index) => {
                    const {rallydatas} = dataset
                    if (!rallydatas) return;
                    return (
                        <section className={`text-xs flex flex-col space-y-1`}>
                            {(rallydatas??[]).map((rally) => {
                                // const resource = mlDataset?.data?.resources[rally?.resource_id]
                                return (<p className={`flex space-x-1 items-center`}>
                                        <span className="truncate ">{rally?.resource_name}</span>
                                        <Badge count={rally?.aggregate} className="site-badge-count-4" size="small"/>
                                    </p>)
                            })}
                        </section>
                    )
                    // return (<Tooltip title={dataset?.api?.name}>
                    //     <p className="text-gray-400">{dataset?.api?.name}</p>
                    // </Tooltip>)
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
                    // loading={lDataset.isLoading}
                    columns={columns}
                    dataSource={lDataset?.data?.datasets}
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
                {lDataset?.search?.name &&
                <h3 className="text-xl mt-3 text-gray-400">
                    {lDataset?.search?.total} results of search <span
                    className="bg-yellow-400 text-black px-1">{lDataset?.search?.name}</span>
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
            <AppHelmet title="Dataset's list"/>
            {lDataset.isLoading && !lDataset.data &&
            <Loading/>
            }
            {!(lDataset.isLoading && !lDataset.data) &&
            renderMain()
            }
        </>
    );
}
export default DatasetListPage

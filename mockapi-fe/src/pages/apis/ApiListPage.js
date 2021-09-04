import {Tooltip, Button, Divider, Popconfirm, Menu, Dropdown, Table} from 'antd';
import {MoreOutlined,} from '@ant-design/icons'
import {useEffect} from 'react';
import moment from "moment"
import "moment-timezone";
import {useDispatch, useSelector} from "react-redux";
import {apisSelector, deleteApi, duplicateApi, listApi, setApiMerge, setApi} from "slices/apis";
import {commonsSelector, handleMenuClick, handleVisibleChange} from "slices/commons";
import {queryMe, usersSelector} from "slices/users";
import {Header, Loading} from "components";
import CreateApiForm from "./CreateApiForm";
import EditApiForm from "./EditApiForm";
import AppHelmet from "shared/AppHelmet";
import {objToString} from "services";
import InfoApiModal from "./InfoApiModal";
import {ShareAvatars} from "components/AntdComponent";

const ApiListPage = () => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {visibles} = useSelector(commonsSelector)
    const {cApi, eApi, lApi, dApi, duApi} = useSelector(apisSelector)
    const {qMe,} = useSelector(usersSelector)

    useEffect(() => {
        if (lApi.isRefresh) {
            dispatch(listApi())
            dispatch(queryMe(window.location.href))
        }
    }, [dispatch, lApi])

    const renderTable = () => {
        const menu = (api) => (
            <Menu onClick={(e) => dispatch(handleMenuClick(e, api))}>
                <Menu.Item>
                    <Button
                        size={`small`}
                        type="link"
                        onClick={(e) => dispatch(setApi({modalApi: {visible: true, api}}))}
                    >
                        Info
                    </Button>
                </Menu.Item>
                {qMe?.data?.id == api?.user?.id &&
                <>
                    <Menu.Item>
                        <Button
                            size={`small`}
                            type="link"
                            onClick={(e) => dispatch(duplicateApi(api))}
                            loading={duApi.isLoading && duApi?.api?.id === api.id}
                        >
                            Duplicate
                        </Button>
                    </Menu.Item>
                    <Menu.Item>
                        <Button
                            size={`small`}
                            type="link"
                            onClick={(e) => dispatch(setApiMerge(`eApi`, {isOpen: true, api}))}
                        >
                            Edit
                        </Button>
                    </Menu.Item>
                    <Menu.Item key={`delete`}>
                        <Popconfirm
                            title={`Delete api: ${api.name}`}
                            onConfirm={(e) => dispatch(deleteApi(api))}
                            okText="Yes"
                            cancelText="No"
                        >
                            <Button
                                size={`small`}
                                type="link"
                                danger
                                loading={dApi?.api?.id === api.id}
                            >Delete</Button>
                        </Popconfirm>
                    </Menu.Item>
                </>
                }
            </Menu>
        )
        const columns = [
            {
                title: 'Name',
                dataIndex: 'name',
                ellipsis: true,
                render: (text, api, index) => {
                    return <Tooltip title={text}>
                        <p className="truncate w-48">{text}</p>
                        <ShareAvatars user={api?.user} shares={api?.shares}/>
                    </Tooltip>
                },
            },
            {
                title: 'Thumb sizes',
                dataIndex: 'thumb_sizes',
                ellipsis: true,
                render: (text, api, index) => {
                    return <Tooltip title={objToString(text)}>{objToString(text)}</Tooltip>
                },
            },
            {
                title: 'Last updated',
                ellipsis: true,
                render: (text, api, index) => {
                    return <Tooltip title={api?.updated_at}>{moment(text).fromNow()}</Tooltip>
                }
            },
            {
                title: 'Action',
                ellipsis: true,
                width: '10%',
                render: (text, api, index) => {
                    return <Dropdown
                        overlay={menu(api)}
                        arrow
                        visible={visibles[api.id]}
                        onVisibleChange={(flag) => dispatch(handleVisibleChange(flag, api))}
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
                    dataSource={lApi?.data}
                    pagination={{pageSize: 20, hideOnSinglePage: true}}
                />
            </>
        )
    }

    const renderMain = () => {
        return (
            <>
                <Header page={`ApiListPage`}/>
                {cApi['isOpen'] &&
                <CreateApiForm/>
                }
                {eApi.isOpen &&
                <EditApiForm
                    visible={true}
                />
                }
                {lApi?.search?.name &&
                <h3 className="text-xl mt-3 text-gray-400">
                    {lApi?.search?.total} results of search <span
                    className="bg-yellow-400 text-black px-1">{lApi?.search?.name}</span>
                </h3>
                }
                <Divider className="mt-4 mb-0"/>
                {renderTable()}
            </>
        )
    }

    return (
        <>
            <AppHelmet title="API's list"/>
            {lApi.isLoading && !lApi.data &&
            <Loading/>
            }
            {!(lApi.isLoading && !lApi.data) &&
            renderMain()
            }
            <InfoApiModal/>
        </>
    );
}
export default ApiListPage

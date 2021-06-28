import {List, Tooltip, Button, Divider, Popconfirm, Badge, Input} from 'antd';
import {useEffect} from 'react';
import moment from "moment";

import CreateApiForm from "./CreateApiForm";
import EditApiForm from "./EditApiForm";

import {useDispatch, useSelector} from "react-redux";
import {apisSelector, editApi, deleteApi, duplicateApi, myApiList, setApiMerge} from "slices/apis";
import {getMe} from "slices/auths";
import {Header, Loading} from "components";

const ApiListPage = () => {
    const dispatch = useDispatch()
    const {cApi, eApi, mlApi, dApi, duApi} = useSelector(apisSelector)

    useEffect(() => {
        if (mlApi.isRefresh) {
            dispatch(myApiList())
            dispatch(getMe(window.location.href))
        }
    }, [dispatch, mlApi])

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
                    onCreate={(values) => dispatch(editApi(values))}
                    onCancel={() => {
                        dispatch(setApiMerge(`eApi`, {isOpen: false}))
                    }}
                />
                }
                {mlApi?.search?.name &&
                <h3 className="text-xl mt-3 text-gray-400">
                    {mlApi?.search?.total} results of search <span
                    className="bg-yellow-400 text-black px-1">{mlApi?.search?.name}</span>
                </h3>
                }
                <Divider className="mt-4 mb-0"/>
                <List
                    itemLayout="vertical"
                    pagination={{
                        hideOnSinglePage: true,
                        pageSize: 10,
                    }}
                    dataSource={mlApi?.data}
                    renderItem={api => (
                        <List.Item
                            key={api.id}
                            actions={[
                                <Button
                                    type="link" className="text-gray-600 pl-0"
                                    onClick={(e) => dispatch(duplicateApi(api))}
                                    loading={duApi.isLoading && duApi?.api?.id === api.id}
                                >Duplicate</Button>,
                                <Button
                                    type="link"
                                    onClick={(e) => dispatch(setApiMerge(`eApi`, {isOpen: true, api}))}
                                    loading={eApi.isLoading && eApi?.api?.id === api.id}
                                >Edit</Button>,
                                <Popconfirm
                                    title={`Are you sure delete.`}
                                    onConfirm={(e) => dispatch(deleteApi(api))}
                                    okText="Yes"
                                    cancelText="No"
                                >
                                    <Button
                                        type="link"
                                        danger
                                        loading={dApi?.api?.id === api.id}
                                    >Delete</Button>
                                </Popconfirm>,
                            ]}
                        >
                            <List.Item.Meta
                                title={
                                    <Button
                                        type="link"
                                        className="px-0"
                                        onClick={(e) => dispatch(setApiMerge(`eApi`, {isOpen: true, api}))}
                                    >{api.name}</Button>
                                }
                                description={moment(api.created_at).fromNow()}
                            />
                        </List.Item>
                    )}
                />
            </>
        )
    }

    return (
        <>
            {mlApi.isLoading && !mlApi.data &&
            <Loading/>
            }
            {!(mlApi.isLoading && !mlApi.data) &&
            renderMain()
            }
        </>
    );
}
export default ApiListPage

import {Menu, Badge, PageHeader, Space, Divider, Tooltip} from 'antd';
import {CrownOutlined, ShareAltOutlined} from '@ant-design/icons';
import React, {useState} from 'react';
import {Link, useHistory, useLocation} from "react-router-dom";
import {useDispatch, useSelector} from "react-redux";
import {useEffect} from "react"
import {queryMe, usersSelector} from "slices/users";
import Avatar from "react-avatar";
import {getFirstThumb, getURLParams, } from "services";
import {isMobile} from 'react-device-detect';
import AppHelmet from "shared/AppHelmet";
import {setRallydata} from "slices/rallydatas";
import {ShareAvatars} from "./AntdComponent";

const Sidebar = (props) => {
    const {qMe} = useSelector(usersSelector)
    const [menuSelected, setMenuSelected] = useState()
    const location = useLocation()
    const menu = {
        ApiListPage: "api",
        ResourceListPage: "resource",
        DatasetListPage: "dataset",
    }
    const dispatch = useDispatch()

    useEffect(() => {
        dispatch(queryMe(window.location.href))
    }, [])
    useEffect(() => {
        if (qMe.isRefresh)
            dispatch(queryMe(window.location.href))
    }, [qMe])

    const url = getURLParams()
    const history = useHistory();

    useEffect(() => {
        let menuSelected = window.location.href.replace(/^.+?\/(\w+)$/gim, '$1')
        if (url.dataset_id_RD) {
            menuSelected = url.dataset_id_RD
        }
        setMenuSelected(menuSelected)
    }, [location])

    const RenderMenu = () => {
        return (
            <Menu
                selectedKeys={[menuSelected]}
                value={menuSelected}
                mode="vertical"
                theme="light"
                className={isMobile ? `border-none` : ``}
            >
                {Object.entries(menu).map(([key, item], i) =>
                    <Menu.Item key={key}>
                        <Link to={`/${key}`} className={`capitalize`}>
                            {item}
                            <Badge count={qMe?.data ? qMe?.data[`${item}s_count`] : 0} className="ml-3" size="small"/>
                        </Link>
                    </Menu.Item>
                )}
                <Menu.ItemGroup key="g1" title="Rallydata">
                    {(qMe?.data?.datasets || []).map((dataset, key) => {
                        // if (key >= 5) return;
                        const isOwner = qMe?.data?.id == dataset?.user?.id
                        return (<Menu.Item key={dataset.id}>
                            <Tooltip title={dataset.name}>
                                <Link
                                    onClick={() => {
                                        dispatch(setRallydata({
                                            dataset_id_RD: dataset.id,
                                            resource_id_RD: dataset.resources[0]?.id,
                                        }))
                                    }}
                                    className="flex items-center space-x-1"
                                    to={`/RallydataPage?dataset_id_RD=${dataset.id}&resource_id_RD=${dataset.resources[0]?.id}`}>
                                    <Space>
                                        {isOwner &&
                                        <CrownOutlined/>
                                        }
                                        {!isOwner &&
                                        <ShareAltOutlined/>
                                        }
                                        <p className="w-32 truncate">{dataset.name}</p>
                                    </Space>
                                    <ShareAvatars shares={dataset?.shares} user={qMe?.data}/>
                                </Link>
                            </Tooltip>


                        </Menu.Item>)
                    })}
                </Menu.ItemGroup>
            </Menu>
        )
    }

    return (
        <aside {...props}>
            {!isMobile &&
            <section className="relative" style={{width: 256}}>
                <div className="fixed top-0" style={{width: 256}}>
                    {/*<div className="w-px bg-gray-200 absolute top-0 h-screen right-0"></div>*/}
                    <PageHeader
                        className="px-3 py-0 border-r"
                        // onBack={() => history.goBack()}
                        title="MockAPI"
                        extra={[
                            <Link to={`/UserPage`} className="flex items-center">
                                <Avatar
                                    className="rounded-full"
                                    size="30"
                                    name={qMe?.data?.name}
                                    // src={qMe?.data?.medium?.thumb_image}
                                    src={getFirstThumb(qMe?.data?.medium)}
                                />
                            </Link>
                        ]}
                    />
                    <Divider className="my-1"/>
                    {RenderMenu()}
                </div>
            </section>
            }
            {isMobile &&
            <>
                <AppHelmet title="Menu"/>
                <div className="-mx-4">
                    <PageHeader
                        className="px-3 py-0"
                        onBack={() => history.goBack()}
                        title="Menu"
                        extra={[
                            <Link to={`/UserPage`} className="flex items-center">
                                <Avatar
                                    className="rounded-full"
                                    size="30"
                                    name={qMe?.data?.name}
                                    // src={qMe?.data?.medium?.thumb_image}
                                    src={getFirstThumb(qMe?.data?.medium)}
                                />
                            </Link>
                        ]}
                    />
                    <Divider className="my-3"/>
                    {RenderMenu()}
                </div>
            </>
            }
        </aside>
    );
}

export {Sidebar}
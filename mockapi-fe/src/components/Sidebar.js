import {Menu, Button, Badge} from 'antd';
import React, {useState} from 'react';
import {Link, useLocation} from "react-router-dom";
import {useSelector} from "react-redux";
import {authsSelector} from "slices/auths";
import {useEffect} from "react"

const Sidebar = ({device = `desktop`}) => {
    const {me} = useSelector(authsSelector)
    const [menuSelected, setMenuSelected] = useState()
    const location = useLocation()
    const menu = {
        ApiListPage: "api",
        ResourceListPage: "resource",
        DatasetListPage: "dataset",
    }

    useEffect(() => {
        const menuSelected = window.location.href.replace(/^.+?\/(\w+)$/gim, '$1')
        setMenuSelected(menuSelected)
    }, [location])

    const mainMenu = () => {
        return (
            <Menu
                selectedKeys={[menuSelected]}
                value={menuSelected}
                mode="vertical"
                theme="light"
            >
                {device === 'desktop' &&
                <>
                    <Menu.Item key="desktop-logo" disabled>
                        <h1 className="">
                            <b>MockAPI</b>
                            <span className="ml-2 text-gray-400">v1.0</span>
                        </h1>
                    </Menu.Item>
                    <Menu.Divider/>
                </>
                }
                {Object.entries(menu).map(([key, item], i) =>
                    <Menu.Item key={key}>
                        <Link to={`/${key}`} className={`capitalize`}>
                            {item}
                            <Badge count={me?.data?.total[item]} className="ml-3" size="small"/>
                        </Link>
                    </Menu.Item>
                )}
                <Menu.ItemGroup key="g1" title="Rallydata">
                    {(me?.data?.datasets || []).map((dataset, key) => {
                        if (key >= 5) return;
                        return (<Menu.Item key={dataset.id}>
                            <Link to={`/RallydataPage?dataset_id_RD=${dataset.id}&resource_id_RD=${dataset.resources[0]?.id}`} >
                                {dataset.name}
                            </Link>
                        </Menu.Item>)
                    })}
                </Menu.ItemGroup>
            </Menu>
        )
    }

    return (
        <aside>
            {device === 'desktop' &&
            <section className={`hidden lg:block relative`} style={{width: 256}}>
                <div className="fixed top-0" style={{width: 256}}>
                    <div className="w-px bg-gray-200 absolute top-0 h-screen right-0"></div>
                    {mainMenu()}
                </div>
            </section>
            }
            {device === 'mobile' &&
            <section className={`lg:hidden relative shadow-xl rounded overflow-hidden border mt-3`}>
                <div className="w-px bg-white absolute top-0 h-screen right-0"></div>
                {mainMenu()}
            </section>
            }
        </aside>
    );
}

export {Sidebar}
import {Badge, Button, Input, Spin} from "antd"
import {PlusOutlined, CloseOutlined, SearchOutlined, MenuOutlined, LoadingOutlined}
    from '@ant-design/icons'
import {useState, useEffect, useRef} from 'react'

import {useDispatch, useSelector} from "react-redux"
import {authsSelector} from "slices/auths"
import {apisSelector, myApiList, setApiMerge} from "slices/apis"
import {resourcesSelector, myResourceList, setResourceMerge} from "slices/resources"
import {Sidebar} from "./index"
import {datasetsSelector, myDatasetList, setDatasetMerge} from "slices/datasets";
import {usersSelector} from "slices/users";

const Header = ({page}) => {
    const dispatch = useDispatch()
    const {mlApi, cApi} = useSelector(apisSelector)
    const {mlResource, cResource} = useSelector(resourcesSelector)
    const {mlDataset, cDataset} = useSelector(datasetsSelector)
    const {qMe} = useSelector(usersSelector)
    const [isMenu, setIsMenu] = useState(false)
    const [isSearch, setIsSearch] = useState(false)
    const [show, setShow] = useState({
        search: true,
        add: true,
        menu: true,
    })
    const searchRef = useRef(null);
    useEffect(() => {
        const show1 = {}
        for (const i in show) {
            show1[i] = false;
        }
        if (isSearch) {
            show1.search = true
            setShow(show1)
            return;
        }
        if (isMenu) {
            show1.menu = true
            setShow(show1)
            return;
        }
        switch (page) {
            case 'ApiListPage':
                if (cApi?.isOpen) {
                    show1.add = true
                    setShow(show1)
                    return;
                }
                break;
            case 'ResourceListPage':
                if (cResource?.isOpen) {
                    show1.add = true
                    setShow(show1)
                    return;
                }
                break;
            case 'DatasetListPage':
                if (cDataset?.isOpen) {
                    show1.add = true
                    setShow(show1)
                    return;
                }
                break;
        }
        for (const i in show) {
            show1[i] = true;
        }
        setShow(show1)
    }, [cApi, cResource, cDataset, isMenu, isSearch])
    useEffect(() => {
        if (show.search && isSearch) {
            searchRef.current.focus({cursor: 'end'});
        }
    }, [show])
    useEffect(() => {
        if (!isSearch) {
            onSearch(``)
        }
    }, [isSearch])
    const antIcon = <LoadingOutlined style={{fontSize: 18}} spin/>;

    const [search, setSearch] = useState(``)
    const onSearch = (value) => {
        if (value === search) return;
        setSearch(value)
        switch (page) {
            case 'ApiListPage':
                dispatch(setApiMerge(`mlApi`, {search: {name: value}}))
                dispatch(myApiList())
                break;
            case 'ResourceListPage':
                dispatch(setResourceMerge(`mlResource`, {search: {name: value}}))
                dispatch(myResourceList())
                break;
            case 'DatasetListPage':
                dispatch(setDatasetMerge(`mlDataset`, {search: {name: value}}))
                dispatch(myDatasetList())
                break;
        }
    }

    const [info, setInfo] = useState({})
    useEffect(() => {
        switch (page) {
            case 'ApiListPage':
                setInfo({
                    name: `Api`,
                    isLoading: mlApi?.isLoading,
                    total: qMe?.data?.apis_count,
                    search: mlApi?.search,
                    cIsOpen: cApi?.isOpen,
                    cIsLoading: cApi?.isLoading,
                })
                break;
            case 'ResourceListPage':
                setInfo({
                    name: `Resource`,
                    isLoading: mlResource?.isLoading,
                    total: qMe?.data?.resources_count,
                    search: mlResource?.search,
                    cIsOpen: cResource?.isOpen,
                    cIsLoading: cResource?.isLoading,
                })
                break;
            case 'DatasetListPage':
                setInfo({
                    name: `Dataset`,
                    isLoading: mlDataset?.isLoading,
                    total: qMe?.data?.datasets_count,
                    search: mlDataset?.search,
                    cIsOpen: cDataset?.isOpen,
                    cIsLoading: cDataset?.isLoading,
                })
                break;
        }
    }, [mlApi, cApi, mlResource, cResource, mlDataset, cDataset, qMe])

    const onAdd = () => {
        switch (page) {
            case 'ApiListPage':
                dispatch(setApiMerge(`cApi`, {isOpen: !cApi?.isOpen}))
                break;
            case 'ResourceListPage':
                dispatch(setResourceMerge(`cResource`, {isOpen: !cResource?.isOpen}))
                break;
            case 'DatasetListPage':
                dispatch(setDatasetMerge(`cDataset`, {isOpen: !cDataset?.isOpen}))
                break;
        }
    }
    return (
        <>
            <header className={`flex items-center ${isSearch ? `justify-end` : `justify-between`}`}>
                {!isSearch &&
                <div className="flex items-center space-x-2">
                    <h1 className="text-2xl capitalize">{info.name}</h1>
                    {info.isLoading &&
                    <Spin indicator={antIcon}/>
                    }
                    {!info.isLoading &&
                    <Badge count={info.total}/>
                    }
                </div>
                }
                <div className="flex items-center space-x-3">
                    {show.search &&
                    <>
                        <Input.Search
                            placeholder="search"
                            allowClear
                            onSearch={(value) => onSearch(value)}
                            onKeyUp={(e) => onSearch(e.target.value)}
                            style={{width: 200}}
                            className={isSearch ? `` : `hidden lg:block`}
                            enterButton
                            ref={searchRef}
                            defaultValue={info?.search?.name}
                        />
                        <Button
                            type={isSearch ? `primary` : `dashed`}
                            className={`lg:hidden`}
                            onClick={(e) => setIsSearch(!isSearch)}
                            icon={isSearch ? <CloseOutlined/> : <SearchOutlined/>}
                        />
                    </>
                    }
                    {show.add &&
                    <Button
                        onClick={(e) => onAdd()}
                        type={info.cIsOpen ? `primary` : `dashed`}
                        icon={info.cIsOpen ? <CloseOutlined/> : <PlusOutlined/>}
                        loading={info.cIsLoading}
                    />
                    }
                    {show.menu &&
                    <Button
                        type={isMenu ? `primary` : `dashed`}
                        className={`lg:hidden`}
                        icon={isMenu ? <CloseOutlined/> : <MenuOutlined/>}
                        onClick={(e) => setIsMenu(!isMenu)}
                    />
                    }
                </div>
            </header>
            {isMenu &&
            <Sidebar device={`mobile`}/>
            }
        </>
    )
}

export {Header}

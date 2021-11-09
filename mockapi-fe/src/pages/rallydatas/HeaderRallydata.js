import {Breadcrumb, Button, Select, Space} from 'antd';
import {PlusOutlined, CloseOutlined, InfoOutlined, FormOutlined, MenuOutlined} from '@ant-design/icons';
import {useCallback, useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {Link, useHistory, } from "react-router-dom";
import InfoDatasetModal from "pages/datasets/InfoDatasetModal";
import EditDatasetForm from "pages/datasets/EditDatasetForm";
import {detailRallydata, rallydatasSelector, setRallydata, setRallydataMerge} from "slices/rallydatas";
import {datasetsSelector, setDataset, editDataset, setDatasetMerge, } from "slices/datasets";
import {usersSelector} from "slices/users";
import {isMobile} from 'react-device-detect';
import {getURLParams} from "services";

const {Option} = Select

const HeaderRallydata = () => {
    const dispatch = useDispatch()
    const {qMe} = useSelector(usersSelector)
    const {deRallydata, mlRallydata, dataset_id_RD, resource_id_RD, cRallydata,} = useSelector(rallydatasSelector)
    const {eDataset} = useSelector(datasetsSelector)
    const history = useHistory()

    const [info, setInfo] = useState({})
    useEffect(() => {
        setInfo({
            name: `Rallydata`,
            isLoading: mlRallydata?.isLoading,
            total: qMe?.data?.total?.api,
            search: mlRallydata?.search,
            cIsOpen: cRallydata?.isOpen,
            cIsLoading: cRallydata?.isLoading,
        })
    }, [qMe, mlRallydata, cRallydata])

    useEffect(() => {
        if (dataset_id_RD)
            dispatch(detailRallydata(dataset_id_RD))
    }, [dataset_id_RD, dispatch])


    useEffect(() => {
        if (!(dataset_id_RD && resource_id_RD)) return;
        // setTimeout(()=>{
            history.push(`/RallydataPage?dataset_id_RD=${dataset_id_RD}&resource_id_RD=${resource_id_RD}`)
        // }, 1000)
        // historyReplaceBack()
    }, [dataset_id_RD, resource_id_RD, ])

    // const historyReplaceBack = useCallback(() => {
    //
    //         history.push(`/RallydataPage?dataset_id_RD=${dataset_id_RD}&resource_id_RD=${resource_id_RD}`)
    //         // console.log('dataset_id_RD', dataset_id_RD)
    //         // console.log('resource_id_RD', resource_id_RD)
    //     // history.replace({
    //     //     pathname: USER_HOME,
    //     // });
    // }, [dataset_id_RD, resource_id_RD, history]);

    const url = getURLParams()
    useEffect(() => {
        if(dataset_id_RD && resource_id_RD) return;
        console.log('url', url)
        console.log('dataset_id_RD', dataset_id_RD)
        dispatch(setRallydata({
            dataset_id_RD: url.dataset_id_RD,
            resource_id_RD: url.resource_id_RD,
        }))
    }, [url])

    const RenderBreadcrumb = () => {

        const DatasetSelect = () => {
            return (<Select
                showSearch
                size={`small`}
                style={{width: isMobile ? 100 : 150}}
                placeholder="Select a dataset"
                value={dataset_id_RD}
                onChange={(id) => {
                    dispatch(setRallydata({dataset_id_RD: id}))
                }}
            >
                {(qMe?.data?.datasets ?? []).map((dataset) => (
                    <Option key={dataset.id} value={(dataset?.id ?? 0).toString()}>{dataset.name}</Option>
                ))}
            </Select>)
        }

        const ResourceSelect = () => {
            const resources = deRallydata?.data?.resources ?? []
            if (resources[0] && !resource_id_RD) {
                dispatch(setRallydata({resource_id_RD: resources[0]?.id.toString()}))
            }
            return (<Select
                showSearch
                size={`small`}
                style={{width: isMobile ? 100 : 150}}
                placeholder="Select a resource"
                value={resource_id_RD}
                onChange={(id) => {
                    dispatch(setRallydata({resource_id_RD: id}))
                }}
                filterOption={(input, option) =>
                    option.props.children.toLowerCase().indexOf(input.toLowerCase()) >= 0
                    || option.props.value.toLowerCase().indexOf(input.toLowerCase()) >= 0
                }
            >
                {resources.map((resource) => (
                    <Option key={resource.id} value={(resource?.id ?? 0).toString()}>{resource.name}</Option>
                ))}
            </Select>)
        }

        if (isMobile) {
            return (
                <section className="flex items-center justify-between">
                    <Breadcrumb>
                        <Breadcrumb.Item>
                            R
                        </Breadcrumb.Item>
                        <Breadcrumb.Item>
                            <DatasetSelect/>
                        </Breadcrumb.Item>
                        <Breadcrumb.Item>
                            <ResourceSelect/>
                        </Breadcrumb.Item>
                    </Breadcrumb>
                    <Link to={`/SidebarPage`}>
                        <Button
                            type="dashed"
                            icon={<MenuOutlined/>}
                            size="small"
                        />
                    </Link>
                </section>
            )
        }
        return (
            <Breadcrumb>
                <Breadcrumb.Item>
                    Rallydata
                </Breadcrumb.Item>
                <Breadcrumb.Item>
                    <DatasetSelect/>
                </Breadcrumb.Item>
                <Breadcrumb.Item>
                    <ResourceSelect/>
                </Breadcrumb.Item>
            </Breadcrumb>
        )
    }

    return (
        <>
            <section className=" lg:flex block items-center justify-between lg:space-y-0 space-y-3">
                <RenderBreadcrumb/>
                <Space>
                    {qMe?.data?.id == deRallydata?.data?.dataset?.user?.id &&
                    <Button
                        onClick={(e) => {
                            dispatch(setDatasetMerge(`eDataset`, {
                                isOpen: true,
                                dataset: deRallydata?.data?.dataset
                            }))
                        }}
                        type="dashed"
                        icon={<FormOutlined/>}
                    />
                    }
                    <Button
                        onClick={(e) => dispatch(setDataset({
                            modalDataset: {
                                visible: true,
                                dataset: deRallydata?.data?.dataset
                            }
                        }))}
                        type="dashed"
                        icon={<InfoOutlined/>}
                    />
                    <Button
                        onClick={(e) => dispatch(setRallydataMerge(`cRallydata`, {isOpen: !cRallydata?.isOpen}))}
                        type={info.cIsOpen ? `primary` : `dashed`}
                        icon={info.cIsOpen ? <CloseOutlined/> : <PlusOutlined/>}
                        loading={info.cIsLoading}
                    />
                </Space>

                <InfoDatasetModal/>
            </section>

            {eDataset.isOpen &&
            <EditDatasetForm
                visible={true}
                onCreate={(values) => dispatch(editDataset(values))}
                onCancel={() => {
                    dispatch(setDatasetMerge(`eDataset`, {isOpen: false}))
                }}
            />
            }
        </>
    )
}

export default HeaderRallydata
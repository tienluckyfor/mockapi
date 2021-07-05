import {Breadcrumb, Button, Select, Space} from 'antd';
import {PlusOutlined, CloseOutlined, InfoOutlined, FormOutlined} from '@ant-design/icons';
import {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {useHistory,} from "react-router-dom";
import InfoDatasetModal from "pages/datasets/InfoDatasetModal";
import EditDatasetForm from "pages/datasets/EditDatasetForm";
import {detailRallydata, rallydatasSelector, setRallydata, setRallydataMerge} from "slices/rallydatas";
import {datasetsSelector, setDataset, editDataset, setDatasetMerge} from "slices/datasets";
import {authsSelector} from "slices/auths";

const {Option} = Select

const HeaderRallydata = () => {
    const dispatch = useDispatch()
    const {me} = useSelector(authsSelector)
    const {deRallydata, mlRallydata, dataset_id_RD, resource_id_RD, cRallydata,} = useSelector(rallydatasSelector)
    const {eDataset} = useSelector(datasetsSelector)
    const history = useHistory()

    const [info, setInfo] = useState({})
    useEffect(() => {
        setInfo({
            name: `Rallydata`,
            isLoading: mlRallydata?.isLoading,
            total: me?.data?.total?.api,
            search: mlRallydata?.search,
            cIsOpen: cRallydata?.isOpen,
            cIsLoading: cRallydata?.isLoading,
        })
    }, [me, mlRallydata, cRallydata])

    useEffect(() => {
        if (dataset_id_RD)
            dispatch(detailRallydata(dataset_id_RD))
    }, [dataset_id_RD])

    useEffect(() => {
        if (dataset_id_RD && resource_id_RD)
            history.push(`/RallydataPage?dataset_id_RD=${dataset_id_RD}&resource_id_RD=${resource_id_RD}`)
    }, [dataset_id_RD, resource_id_RD])

    const renderBreadcrumb = () => {

        const datasetSelect = () => {
            return (<Select
                // showSearch
                size={`small`}
                style={{width: 150}}
                placeholder="Select a dataset"
                value={dataset_id_RD}
                onChange={(id) => {
                    dispatch(setRallydata({dataset_id_RD: id}))
                }}
            >
                {(me?.data?.datasets ?? []).map((dataset) => (
                    <Option key={dataset.id} value={dataset.id.toString()}>{dataset.name}</Option>
                ))}
            </Select>)
        }

        const resourceSelect = () => {
            const resources = deRallydata?.data?.resources ?? []
            if (resources[0] && !resource_id_RD) dispatch(setRallydata({resource_id_RD: resources[0]?.id}))
            return (<Select
                // showSearch
                size={`small`}
                style={{width: 150}}
                placeholder="Select a resource"
                value={resource_id_RD}
                onChange={(id) => {
                    dispatch(setRallydata({resource_id_RD: id}))
                }}
            >
                {resources.map((resource) => (
                    <Option key={resource.id} value={resource.id.toString()}>{resource.name}</Option>
                ))}
            </Select>)
        }

        return (
            <Breadcrumb>
                <Breadcrumb.Item>Rallydata</Breadcrumb.Item>
                <Breadcrumb.Item>
                    {datasetSelect()}
                </Breadcrumb.Item>
                <Breadcrumb.Item>
                    {resourceSelect()}
                </Breadcrumb.Item>
            </Breadcrumb>
        )
    }

    return (
        <>
            <section className="flex items-center justify-between">
                {renderBreadcrumb()}
                <Space>
                    <Button
                        onClick={(e) => dispatch(setDatasetMerge(`eDataset`, {
                            isOpen: true,
                            dataset: deRallydata?.data?.dataset
                        }))}
                        type="dashed"
                        icon={<FormOutlined/>}
                    />
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
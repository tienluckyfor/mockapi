import {Form, Input, Button, DatePicker, InputNumber, Switch, Checkbox, Image, Space} from 'antd';
import React, {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getItype, getRallyData} from "./configRallydata";
import moment from 'moment';
import {rallydatasSelector, setRallydataMerge, createRallydata} from "slices/rallydatas";
import {MediaModal} from "components";
import {mediaSelector, setMediaMerge,} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import ModalChildRallydata from "./ModalChildRallydata";
import RenderTableRallydata from "./RenderTableRallydata";

const CreateRallydataForm = ({fields}) => {
    const dispatch = useDispatch()
    const {cRallydata, dataset_id_RD, resource_id_RD, deRallydata, mRallydataData, cbRallydata, fieldsRallydata} = useSelector(rallydatasSelector)
    const {mlMedia, mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)

    const [form] = Form.useForm()

    useEffect(() => {
        if (!(dataset_id_RD && resource_id_RD && fields)) return;
        let fieldsValue = {
            "dataset_id": dataset_id_RD,
            "resource_id": resource_id_RD,
            "data": {}
        };
        (fields ?? []).map((field) => {
            const {name, type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            if (iType === `Date`) {
                fieldsValue.data[name] = moment()
            }
        })
        form.setFieldsValue(fieldsValue)
    }, [dataset_id_RD, resource_id_RD, fields])

    useEffect(() => {
        // media
        const fmedia = (fields ?? []).filter((field) => {
            const {name, type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            return iType === "Media"
        })
        let values = form.getFieldsValue()
        for (const key in fmedia) {
            const f = fmedia[key]
            const mediaR = (mlMedia.data ?? []).filter((medium) => checkedList[f.name] && checkedList[f.name].indexOf(medium.id) !== -1)
            dispatch(setMediaMerge('cbMedia', {[f.name]: mediaR}))
            values.data[f.name] = {
                type: 'media',
                media_ids: mediaR.map((medium) => medium.id)
            }
        }
        // form.setFieldsValue({data})

        // children
        values.data_children = []
        for (const key in childResources) {
            const r = childResources[key]
            const childrenR = getRallyData(mRallydataData, r.id).filter((rally) => checkedList[r.name] && checkedList[r.name].indexOf(rally.data.id) !== -1)
            dispatch(setRallydataMerge('cbRallydata', {[r.name]: childrenR}))
            values.data_children.push({
                type: 'rallydata',
                resource_id: r.id,
                rallydata_ids: childrenR.map((rally) => rally.id)
            })
        }
        // console.log('data_children', data_children)
        form.setFieldsValue(values)
    }, [checkedList])

    const [childResources, setChildResources] = useState([])
    useEffect(() => {
        const resources = (deRallydata?.data?.resources ?? []).filter((item) => (item?.parents ?? []).indexOf(resource_id_RD) !== -1)
        setChildResources(resources)
    }, [deRallydata])

    return (
        <Form
            form={form}
            layout={`vertical`}
            onFinish={(values) => dispatch(createRallydata(values))}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
        >
            <MediaModal/>
            <ModalChildRallydata/>
            <Form.List name="data">
                {(afields, {add, remove}) => (
                    (fields ?? []).map((field) => {
                        const {name, type, fakerjs} = field
                        const iType = getItype(type, fakerjs)
                        switch (iType) {
                            case `Media`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <section className="flex flex-col space-y-3">
                                        <Button
                                            className="w-36"
                                            onClick={() => dispatch(setMediaMerge('mMedia', {
                                                visible: !mMedia?.visible,
                                                name
                                            }))}
                                        >Choose media</Button>
                                        {cbMedia[name]?.length !== 0 &&
                                        <div>
                                            <Space size={[10, 10]} wrap>
                                                {(cbMedia[name] ?? []).map((medium, key) => (
                                                    <div className={`relative border border-gray-300 p-1`}
                                                         style={{width: 104, height: 104}}>
                                                        <Checkbox
                                                            onChange={() => {
                                                                const checkedList1 = checkedList[name].filter((item) => item != medium.id)
                                                                dispatch(setCommonMerge('checkedList', {[name]: checkedList1}))
                                                            }}
                                                            value={medium.id}
                                                            defaultChecked
                                                            className={`absolute z-10 left-0 top-0 ml-1 mt-1 m-0 px-1 bg-white rounded`}/>
                                                        <Image
                                                            preview={false}
                                                            height={90}
                                                            width={90}
                                                            style={{objectFit: "cover"}}
                                                            src={medium.thumb_image}
                                                        />
                                                    </div>
                                                ))}
                                            </Space>
                                        </div>
                                        }
                                    </section>
                                </Form.Item>)
                                break;
                            case `Date`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <DatePicker/>
                                </Form.Item>)
                                break;
                            case `String`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <Input/>
                                </Form.Item>)
                                break;
                            case `Text`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <Input.TextArea/>
                                </Form.Item>)
                                break;
                            case `LongText`:
                            case `Object`:
                            case `Array`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <Input.TextArea rows={6}/>
                                </Form.Item>)
                                break;
                            case `Number`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <InputNumber/>
                                </Form.Item>)
                                break;
                            case `Boolean`:
                                return (<Form.Item
                                    valuePropName="checked"
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <Switch/>
                                </Form.Item>)
                                break;
                        }
                    })
                )}
            </Form.List>

            <Form.List name="data_children">
                {(afields, {add, remove}) => (
                    childResources.map((resource) => {
                        const {name, id,} = resource
                        return (<Form.Item
                            name={name}
                            label={<span className="capitalize">{name}</span>}
                        >
                            <section className="flex flex-col space-y-3">
                                <Button
                                    className="w-36"
                                    onClick={() => dispatch(setRallydataMerge('mRallydata', {
                                        visible: !mMedia?.visible,
                                        resource,
                                    }))}
                                >
                                    <p className="truncate">Choose {name}</p>
                                </Button>
                                {cbRallydata[name] && cbRallydata[name]?.length !== 0 &&
                                <RenderTableRallydata
                                    typeShow="checked"
                                    mlDRRallydata={{data: cbRallydata[name]}}
                                    fieldsRallydata={fieldsRallydata[id]}
                                    resourceName={name}
                                />
                                }

                            </section>
                        </Form.Item>)
                    })
                )}
            </Form.List>
            <Form.Item hidden={true} name="dataset_id"/>
            <Form.Item hidden={true} name="resource_id"/>
            <div className="flex items-center justify-end mt-3 ">
                <Button
                    onClick={(e) => dispatch(setRallydataMerge(`cRallydata`, {isOpen: false}))}
                >
                    Cancel
                </Button>
                <Button
                    className="ml-3"
                    type="primary"
                    htmlType="submit"
                    loading={cRallydata.isLoading}
                >
                    Submit
                </Button>
            </div>
        </Form>
    );
};

export default CreateRallydataForm
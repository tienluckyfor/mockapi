import {Form, Input, Button, DatePicker, InputNumber, Switch, Checkbox, Image, Space, Select} from 'antd';
import React from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getItype,} from "./configRallydata";
import {rallydatasSelector, setRallydataMerge,} from "slices/rallydatas";
import {mediaSelector, setMediaMerge,} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import RenderTableRallydata from "./RenderTableRallydata";

import {ControlledAceEditor, ControlledJsonEditor, ReactQuillCustom} from "components";

const {Option} = Select;

const FormRallydata = ({fields, from, childResources,}) => {
    const dispatch = useDispatch()
    const {cbRallydata, fieldsRallydata, mRallydataData, resource_id_RD} = useSelector(rallydatasSelector)
    const {mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)
    const rallies = mRallydataData?.data && mRallydataData?.data[resource_id_RD]
    return (
        <>
            <Form.List name="data">
                {(afields, {add, remove}) => (
                    (fields ?? []).map((field) => {
                        const {name, type, fakerjs} = field
                        if (type === 'Resource') return;
                        const iType = getItype(type, fakerjs)
                        // console.log('name', name)
                        switch (iType) {
                            case `Object`:
                            case `Array`:
                                return (
                                    <Form.Item
                                        name={name}
                                        label={<span className="capitalize">{name}</span>}
                                        initialValue={"{\n\t\n}"}
                                    >
                                        {/*<ControlledJsonEditor
                                            value={eRallydata?.rallydata && eRallydata?.rallydata[name]
                                                ? eRallydata?.rallydata[name] : {}}
                                        />*/}
                                        <ControlledAceEditor/>
                                    </Form.Item>)
                                break;
                            case `LongText`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                    initialValue=""
                                >
                                    <ReactQuillCustom
                                        name={`${from}-${name}`}
                                        onChange={(html) => {
                                        }}
                                    />
                                </Form.Item>)
                                break;
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
                                                            checked
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
                            case `Select`:
                                const selectKeys = (rallies ?? [])
                                    .map((rally) => rally?.data && rally?.data[name] ? rally?.data[name] : false)
                                    .filter(item => item)
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <Select mode="tags" style={{width: '300px'}}>
                                        {selectKeys.map((item) =>
                                            <Option key={item}>{item}</Option>
                                        )}
                                    </Select>
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
        </>
    )
}

export default FormRallydata
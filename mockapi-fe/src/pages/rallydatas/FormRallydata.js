import {Form, Input, Button, DatePicker, InputNumber, Switch, Select, Space, Checkbox} from 'antd';
import React from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getItype,} from "./configRallydata";
import {rallydatasSelector, setRallydataMerge,} from "slices/rallydatas";
import {mediaSelector, } from "slices/media";
import RenderTableRallydata from "./RenderTableRallydata";
import {ControlledAceEditor, ReactQuillCustom, ThumbChecked} from "components";

const {Option} = Select;

const FormRallydata = ({fields, from, childResources,}) => {
    const dispatch = useDispatch()
    const {cbRallydata, fieldsRallydata, mRallydataData, resource_id_RD} = useSelector(rallydatasSelector)
    const {mMedia,} = useSelector(mediaSelector)
    const rallies = mRallydataData?.data && mRallydataData?.data[resource_id_RD]

    return (
        <>
            <Space size="large">
                <Form.Item name="is_show" valuePropName="checked">
                    <Checkbox>Is show</Checkbox>
                </Form.Item>
                <Form.Item name="is_pin" valuePropName="checked">
                    <Checkbox>Is pined</Checkbox>
                </Form.Item>
            </Space>
            <Form.List name="data">
                {(afields, {add, remove}) => (
                    (fields ?? []).map((field) => {
                        const {name, type, fakerjs} = field
                        if (type === 'Resource') return;
                        const iType = getItype(type, fakerjs)
                        switch (iType) {
                            case `Object`:
                            case `Array`:
                                return (
                                    <Form.Item
                                        name={name}
                                        label={<span className="capitalize">{name}</span>}
                                        initialValue={"{\n\t\n}"}
                                    >
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
                                        onChange={(html) => { }}
                                    />
                                </Form.Item>)
                                break;
                            case `Media`:
                                const fName = `${from}-${name}`
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <ThumbChecked name={fName}/>
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
                                let selectKeys = (rallies ?? [])
                                    .map((rally) => rally?.data && rally?.data[name] ? rally?.data[name] : false)
                                    .filter(item => item)
                                    .flat()
                                selectKeys = [...new Set(selectKeys)];
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
                            case `Authentication`:
                                return (<Form.Item
                                    name={name}
                                    label={<span className="capitalize">{name}</span>}
                                >
                                    <Input/>
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
                        const fName = `${from}-${name}`
                        return (<Form.Item
                            name={name}
                            label={<span className="capitalize">{name}</span>}
                        >
                            <section className="flex flex-col space-y-3">
                                <Button
                                    className="w-36"
                                    onClick={() => dispatch(setRallydataMerge('mRallydata', {
                                        visible: !mMedia?.visible,
                                        resource: {...resource, fName},
                                    }))}
                                >
                                    <p className="truncate">Choose {name}</p>
                                </Button>
                                {cbRallydata[fName] && cbRallydata[fName]?.length !== 0 &&
                                <RenderTableRallydata
                                    typeShow="checked"
                                    mlDRRallydata={{data: cbRallydata[fName]}}
                                    fieldsRallydata={fieldsRallydata[id]}
                                    resourceName={fName}
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
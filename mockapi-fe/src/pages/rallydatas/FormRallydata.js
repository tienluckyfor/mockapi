import {Form, Input, Button, DatePicker, InputNumber, Switch, Checkbox, Image, Space} from 'antd';
import React, {useEffect, useState,} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getItype,} from "./configRallydata";
import {rallydatasSelector, setRallydataMerge,} from "slices/rallydatas";
import {mediaSelector, setMediaMerge,} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import RenderTableRallydata from "./RenderTableRallydata";
import {JsonEditor} from 'jsoneditor-react';

import ReactQuill from "react-quill";
import Quill from "quill";
import ResizeModule from "@ssumo/quill-resize-module";
import QuillImageDropAndPaste from "quill-image-drop-and-paste";
import "react-quill/dist/quill.snow.css";

Quill.register("modules/resize", ResizeModule);
Quill.register('modules/imageDropAndPaste', QuillImageDropAndPaste)

const FormRallydata = ({fields, form, childResources}) => {
    const dispatch = useDispatch()
    const {cbRallydata, fieldsRallydata} = useSelector(rallydatasSelector)
    const {mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)

    const modules = {
        resize: {
            locale: {
                altTip: "按住alt键比例缩放",
                floatLeft: "left",
                floatRight: "right",
                center: "center",
                restore: "res.."
            }
        },
        toolbar: [
            [{'header': [1, 2, 3, false]}],
            ['bold', 'italic', 'underline', 'strike', 'blockquote'],
            [{'list': 'ordered'}, {'list': 'bullet'}, {'indent': '-1'}, {'indent': '+1'}],
            ['link', 'image', 'video'],
            [{'align': []}, {'color': []}, {'background': []}],
            ['clean']
        ],
    }

    const [dEditor, setDEditor] = useState({})
    useEffect(() => {
        let values = form.getFieldsValue()
        Object.entries(dEditor).map(([key, item], i) => {
            values.data[key] = item
        })
        form.setFieldsValue(values)
    }, [dEditor])

    return (
        <>
            <Form.List name="data">
                {(afields, {add, remove}) => (
                    (fields ?? []).map((field) => {
                        const {name, type, fakerjs} = field
                        if (type === 'Resource') return;
                        const iType = getItype(type, fakerjs)
                        switch (iType) {
                            case `Object`:
                            case `Array`:
                                return (<div className="mb-6">
                                    <p className="capitalize mb-2">{name}</p>
                                    <JsonEditor
                                        value={dEditor[name] ?? (iType === 'Array' ? [] : {})}
                                        mode="code"
                                        onChange={(value) => setDEditor({...dEditor, [name]: value})}
                                        allowedModes={['tree', 'form', 'code']}
                                    />
                                    <Form.Item hidden={true} name={name}/>
                                </div>)
                                break;
                            case `LongText`:
                                return (<div className="mb-6">
                                    <p className="capitalize mb-2">{name}</p>
                                    <ReactQuill
                                        bounds={'.App'}
                                        modules={modules}
                                        onChange={(value, delta, source, editor) => {
                                            setDEditor({...dEditor, [name]: editor.getHTML()})
                                        }}
                                    />
                                    <Form.Item hidden={true} name={name}/>
                                </div>)
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
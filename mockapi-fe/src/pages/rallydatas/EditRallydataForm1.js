import {Modal, Form, Input, Upload, Button, DatePicker, InputNumber, Switch, message} from 'antd';
import {UploadOutlined,} from '@ant-design/icons';
import {useSelector} from "react-redux";
import {rallydatasSelector} from "slices/rallydatas";
import {getItype} from "./configRallydata";
import moment from "moment";
import {useEffect, useState} from 'react'

const EditRallydataForm = ({visible, onCreate, onCancel, fields}) => {
    const {eRallydata, dataset_id_RD, resource_id_RD} = useSelector(rallydatasSelector)
    const [form] = Form.useForm()

    useEffect(() => {
        if (!(dataset_id_RD && resource_id_RD && fields)) return;
        let fieldsValue = {
            id: eRallydata.rallydata.originalId,
            dataset_id: dataset_id_RD,
            resource_id: resource_id_RD,
            data: JSON.parse(JSON.stringify(eRallydata.rallydata)),
        }
        fields.map((field) => {
            const {name, type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            if (iType === `Date`) {
                console.log('fieldsValue.data[name]', fieldsValue.data[name])
                fieldsValue.data[name] = moment(fieldsValue.data[name])
            }
        })
        console.log('fieldsValue', fieldsValue)

        form.setFieldsValue(fieldsValue)
    }, [dataset_id_RD, resource_id_RD, fields])

    const uploadProps = {
        name: 'file',
        action: 'https://www.mocky.io/v2/5cc8019d300000980a055e76',
        headers: {
            authorization: 'authorization-text',
        },
        onChange(info) {
            if (info.file.status !== 'uploading') {
                console.log(info.file, info.fileList);
            }
            if (info.file.status === 'done') {
                message.success(`${info.file.name} file uploaded successfully`);
            } else if (info.file.status === 'error') {
                message.error(`${info.file.name} file upload failed.`);
            }
        },
    }

    return (
        <Modal
            visible={visible}
            title="Edit Rallydata"
            okText="Save"
            cancelText="Cancel"
            onCancel={onCancel}
            confirmLoading={eRallydata.isLoading}
            onOk={() => {
                form
                    .validateFields()
                    .then((values) => {
                        form.resetFields()
                        onCreate(values)
                    })
                    .catch((info) => {
                        console.log('Validate Failed:', info);
                    });
            }}
        >
            <Form
                form={form}
                layout="vertical"
            >
                <Form.List name="data">
                    {(afields, {add, remove}) => (
                        fields.map((field) => {
                            const {name, type, fakerjs} = field
                            const iType = getItype(type, fakerjs)
                            // console.log('name, type, fakerjs, iType', name, type, fakerjs, iType)
                            switch (iType) {
                                case `UploadImage`:
                                    return (<Form.Item
                                        name={name}
                                        label={<span className="capitalize">{name}</span>}
                                    >
                                        <Upload {...uploadProps} >
                                            <Button block icon={<UploadOutlined/>}>Upload image</Button>
                                        </Upload>
                                    </Form.Item>)
                                    break;
                                case `Date`:
                                    return (<Form.Item
                                        name={name}
                                        label={<span className="capitalize">{name}</span>}
                                    >
                                        <DatePicker />
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
                <Form.Item hidden={true} name="dataset_id"/>
                <Form.Item hidden={true} name="resource_id"/>
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditRallydataForm
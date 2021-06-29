import {useEffect, useState} from 'react'
import {Modal, Form, } from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {resourcesSelector, } from "slices/resources";
import {apisSelector, myApiList} from "slices/apis";
import FormResource from "./FormResource";

const EditResourceForm = ({visible, onCreate, onCancel}) => {
    const dispatch = useDispatch()
    const {eResource} = useSelector(resourcesSelector)
    const {mlApi} = useSelector(apisSelector)
    const [rName, setRName] = useState()
    const [formValue, setFormValue] = useState({})
    const [form] = Form.useForm()
    const [endpoints, setEndpoints] = useState([])
    const [fields, setFields] = useState([])

    useEffect(() => {
        dispatch(myApiList())
    }, [])

    useEffect(() => {
        setEndpoints(eResource?.resource?.endpoints)
        setFields(eResource?.resource?.fields)
        setFormValue({fields, endpoints})
        let api = (mlApi.data ?? []).filter((api) => api?.id == eResource?.resource?.api_id)
        api = api[0] ?? {}
        form.setFieldsValue({
            id: eResource?.resource?.id,
            name: eResource?.resource?.name,
            api_id: api?.id.toString(),
            field_template: eResource?.resource?.field_template,
            fields: eResource?.resource?.fields,
            endpoints: eResource?.resource?.endpoints,
        });
        setRName(eResource?.resource?.name)
    }, [eResource, mlApi])

    return (
        <Modal
            visible={visible}
            title="Edit Resource"
            okText="Save"
            cancelText="Cancel"
            onCancel={onCancel}
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
            width={570}
            confirmLoading={eResource.isLoading}
        >
            <Form
                form={form}
                layout="vertical"
                onFieldsChange={(_, allFields) => {
                    const formValue = {}
                    allFields.map((item) => {
                        formValue[item.name] = item.value
                    })
                    setFormValue(formValue)
                }}
            >
                <FormResource formValue={formValue} resourceName={rName}/>
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditResourceForm
import {useEffect, useState} from 'react'
import {Modal, Form,} from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {editResource, resourcesSelector, setResourceMerge,} from "slices/resources";
import {apisSelector, listApi} from "slices/apis";
import FormResource from "./FormResource";

const EditResourceForm = () => {
    const dispatch = useDispatch()
    const {eResource} = useSelector(resourcesSelector)
    const {lApi} = useSelector(apisSelector)
    const [rName, setRName] = useState()
    const [formValue, setFormValue] = useState({})
    const [form] = Form.useForm()
    const [endpoints, setEndpoints] = useState([])
    const [fields, setFields] = useState([])

    useEffect(() => {
        dispatch(listApi())
    }, [])

    useEffect(() => {
        setEndpoints(eResource?.resource?.endpoints)
        setFields(eResource?.resource?.fields)
        setFormValue({fields, endpoints})
        let api = (lApi.data ?? []).filter((api) => api?.id == eResource?.resource?.api_id)
        api = api[0] ?? {}
        form.setFieldsValue({
            id: eResource?.resource?.id,
            name: eResource?.resource?.name,
            api_id: (api?.id ?? 0).toString(),
            field_template: eResource?.resource?.field_template,
            fields: eResource?.resource?.fields,
            endpoints: eResource?.resource?.endpoints,
        });
        setRName(eResource?.resource?.name)
    }, [eResource, lApi])

    return (
        <Modal
            visible={true}
            title="Edit Resource"
            okText="Save"
            cancelText="Cancel"
            onCancel={() =>
                dispatch(setResourceMerge(`eResource`, {isOpen: false}))
            }
            onOk={() => {
                form
                    .validateFields()
                    .then((values) => {
                        form.resetFields()
                        // onCreate(values)
                        dispatch(editResource(values))
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
import {useEffect, useState} from 'react'
import {Modal, Form,} from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {editResource, resourcesSelector, setResourceMerge,} from "slices/resources";
import {apisSelector, listApi} from "slices/apis";
import FormResource, {resourceFieldsChange} from "./FormResource";
import {authFields} from "./configResource";

const EditResourceForm = () => {
    const dispatch = useDispatch()
    const {eResource} = useSelector(resourcesSelector)
    const {lApi} = useSelector(apisSelector)
    const [rName, setRName] = useState()
    const [formValue, setFormValue] = useState({})
    const [form] = Form.useForm()

    useEffect(() => {
        dispatch(listApi())
    }, [dispatch])

    useEffect(() => {
        let api = (lApi.data ?? []).filter((api) => api?.id == eResource?.resource?.api_id)
        api = api[0] ?? {}
        const obj = {
            id: eResource?.resource?.id,
            name: eResource?.resource?.name,
            api_id: (api?.id ?? 0).toString(),
            field_template: eResource?.resource?.field_template,
            fields: eResource?.resource?.fields,
            endpoints: eResource?.resource?.endpoints,
        }
        obj.is_authentication = (obj.fields ?? []).filter(item => item.type == 'Authentication').length!=0
        form.setFieldsValue(obj);
        setFormValue({
            fields: obj.fields,
            endpoints: obj.endpoints
        })
        setRName(eResource?.resource?.name)
    }, [eResource, lApi, form, ])

    useEffect(() => {
        form.setFieldsValue(formValue)
    }, [formValue, form])

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
                onFieldsChange={(f, allFields) => {
                    /*let formValue = {};
                    (allFields ?? []).forEach(item => {
                        formValue[item.name] = item.value
                    })
                    (f ?? []).forEach(item => {
                        if (item.name.indexOf('is_authentication') != -1 && item.value) {
                            formValue.fields = [...authFields, ...formValue.fields]
                        }
                        if (item.name.indexOf('is_authentication') != -1 && !item.value) {
                            formValue.fields = (formValue.fields ?? []).filter((item) => item.type != 'Authentication')
                        }
                    })
                    setFormValue(formValue)*/
                    resourceFieldsChange(f, allFields, setFormValue)
                }}
            >
                <FormResource formValue={formValue} resourceName={rName}/>
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditResourceForm
import {Form, Button,} from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {useEffect, useState} from 'react'
import {listApi} from "slices/apis"
import {resourcesSelector, setResourceMerge, createResource} from "slices/resources"
import {fields, endpoints, authFields} from "./configResource"
import FormResource, {resourceFieldsChange} from "./FormResource";

const CreateResourceForm = () => {
    const dispatch = useDispatch()
    const {cResource} = useSelector(resourcesSelector)
    const [formValue, setFormValue] = useState({})
    const [form] = Form.useForm()

    useEffect(() => {
        dispatch(listApi())
        setFormValue({fields, endpoints})
    }, [dispatch])

    useEffect(() => {
        form.setFieldsValue(formValue)
    }, [formValue, form])

    return (
        <Form
            form={form}
            onFinish={(values) => {
                dispatch(createResource(values))
            }}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
            layout={`vertical`}
            onFieldsChange={(f, allFields) => {
                resourceFieldsChange(f, allFields, setFormValue)
                // let formValue = {};
                // (allFields ?? []).forEach(item => {
                //     formValue[item.name] = item.value
                // });
                // (f ?? []).forEach(item => {
                //     if (item.name.indexOf('is_authentication') != -1 && item.value) {
                //         formValue.fields = [...authFields, ...formValue.fields]
                //     }
                //     if (item.name.indexOf('is_authentication') != -1 && !item.value) {
                //         formValue.fields = (formValue.fields ?? []).filter((item) => item.type != 'Authentication')
                //     }
                // })
                // setFormValue(formValue)
            }}
            scrollToFirstError
        >
            <FormResource formValue={formValue}/>
            <div className="flex items-center justify-end mt-3 ">
                <Button
                    onClick={(e) => dispatch(setResourceMerge(`cResource`, {isOpen: false}))}
                >
                    Cancel
                </Button>
                <Button
                    className="ml-3"
                    type="primary"
                    htmlType="submit"
                    loading={cResource.isLoading}
                >
                    Submit
                </Button>
            </div>
        </Form>
    );
};

export default CreateResourceForm
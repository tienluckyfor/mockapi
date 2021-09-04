import {Form, Button, } from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {useEffect, useState} from 'react'
import {listApi} from "slices/apis"
import {resourcesSelector, setResourceMerge, createResource} from "slices/resources"
import {fields, endpoints, } from "./configResource"
import FormResource from "./FormResource";

const CreateResourceForm = () => {
    const dispatch = useDispatch()
    const {cResource} = useSelector(resourcesSelector)
    const [formValue, setFormValue] = useState({})

    useEffect(() => {
        dispatch(listApi())
        setFormValue({fields, endpoints})
    }, [])

    return (
        <Form
            onFinish={(values) => {
                // console.log('values', values)
                // return;
                dispatch(createResource(values))
            }}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
            layout={`vertical`}
            onFieldsChange={(_, allFields) => {
                console.log('allFields', allFields)
                const formValue = {}
                allFields.map((item) => {
                    formValue[item.name] = item.value
                })
                setFormValue(formValue)
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
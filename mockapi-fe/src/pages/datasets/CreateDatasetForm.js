import {Form, Button, } from 'antd'
import {useDispatch, useSelector} from "react-redux"
import {useEffect, useState} from 'react'
import {listApi} from "slices/apis"
import {datasetsSelector, setDatasetMerge, createDataset, setDataset} from "slices/datasets"
import FormDataset from "./FormDataset";
import {listResource} from "slices/resources";

const CreateDatasetForm = () => {
    const dispatch = useDispatch()
    const {cDataset, eDataset, amounts} = useSelector(datasetsSelector)
    const [apiId, setApiId] = useState()

    useEffect(() => {
        dispatch(listApi())
    }, [dispatch])

    useEffect(() => {
        dispatch(listResource(apiId))
    }, [apiId, dispatch])

    useEffect(() => {
        if(eDataset.isOpen) return;
        let amounts = {};
        (cDataset?.resources ?? []).forEach(resource => {
            amounts[resource.id] = 0
        })
        dispatch(setDataset({amounts}))
    }, [cDataset, eDataset, dispatch])

    const [form] = Form.useForm()
    form.setFieldsValue({
        amounts,
        locale: 'en_US',
    })

    return (
        <Form
            form={form}
            onFinish={(values) => dispatch(createDataset(values))}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
            layout={`vertical`}
            scrollToFirstError
        >
            <FormDataset apiId={apiId} setApiId={setApiId}/>
            <section className="flex items-center justify-end space-x-3 mt-3 ">
                <Button
                    onClick={(e) => dispatch(setDatasetMerge(`cDataset`, {isOpen: false}))}
                >
                    Cancel
                </Button>
                <Button

                    type="primary"
                    htmlType="submit"
                    loading={cDataset.isLoading}
                >
                    Submit
                </Button>
            </section>
        </Form>
    );
};

export default CreateDatasetForm
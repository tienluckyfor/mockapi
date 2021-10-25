import {Form, Modal,} from 'antd'
import {useDispatch, useSelector} from "react-redux"
import {useEffect, useState} from 'react'
import {datasetsSelector, myDatasetList, setDataset} from "slices/datasets"
import FormDataset from "./FormDataset";

const EditDatasetForm = ({visible, onCreate, onCancel}) => {
    const dispatch = useDispatch()
    const {eDataset, mlDataset, amounts, countChangeRally} = useSelector(datasetsSelector)
    const [apiId, setApiId] = useState()

    useEffect(() => {
        setApiId(eDataset?.dataset?.api?.id)
    }, [eDataset])

    const [form] = Form.useForm()
    const values = {
        ...eDataset?.dataset,
        api_id: (eDataset?.dataset?.api?.id ?? 0).toString(),
        amounts,
        count_change_rally: countChangeRally
    }
    form.setFieldsValue(values)

    useEffect(() => {
        form.setFieldsValue({
            count_change_rally: countChangeRally
        })
    }, [countChangeRally, form])

    useEffect(() => {
        const dataset = eDataset?.dataset
        const rallies = mlDataset?.data?.rallies[dataset.id]
        let amounts1 = {};
        (rallies ?? []).forEach(rally => {
            amounts1[rally.resource_id] = rally.count
        })
        dispatch(setDataset({amounts: amounts1}))
    }, [eDataset, mlDataset, dispatch])

    useEffect(() => {
        if (mlDataset.isRefresh) {
            dispatch(myDatasetList())
        }
    }, [dispatch, mlDataset])


    return (
        <Modal
            visible={visible}
            title="Edit Dataset"
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
            confirmLoading={eDataset.isLoading}
        >
            <Form
                form={form}
                layout="vertical"
            >
                <FormDataset apiId={apiId} setApiId={setApiId}/>
                <Form.Item hidden={true} name="id"/>
                <Form.Item hidden={true} name="count_change_rally"/>
            </Form>
        </Modal>
    );
};

export default EditDatasetForm
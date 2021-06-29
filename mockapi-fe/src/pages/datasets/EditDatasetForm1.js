import {Form, Input, Select, Tree, Table, Modal,} from 'antd'
import {DownOutlined} from '@ant-design/icons'
import {useDispatch, useSelector} from "react-redux"
import {useEffect, useState} from 'react'
import {apisSelector, myApiList} from "slices/apis"
import {myResourceList} from "slices/resources"
import {datasetsSelector, myDatasetList, setDataset} from "slices/datasets"
import {ChildAmountData, ParentAmountData} from "./AmountData"
import {locales} from "./configDataset"

const {Option} = Select;
const EditDatasetForm = ({visible, onCreate, onCancel}) => {
    const dispatch = useDispatch()
    const {cDataset, eDataset, mlDataset, amounts} = useSelector(datasetsSelector)
    const {mlApi} = useSelector(apisSelector)
    const [api_id, setApi_id] = useState()

    useEffect(() => {
        dispatch(myApiList())
    }, [])

    useEffect(() => {
        if (!api_id) return;
        dispatch(myResourceList(api_id))
    }, [api_id])

    useEffect(() => {
        setApi_id(eDataset?.dataset.api_id)
    }, [eDataset])

    const [form] = Form.useForm()
    const values = {
        ...eDataset?.dataset,
        api_id: eDataset?.dataset?.api_id.toString(),
        amounts,
    }
    form.setFieldsValue(values)

    useEffect(() => {
        const dataset = eDataset?.dataset
        const rallies = mlDataset?.data?.rallies[dataset.id]
        let amounts1 = {};
        (rallies ?? []).forEach(rally => {
            amounts1[rally.resource_id] = rally.count
        })
        dispatch(setDataset({amounts: amounts1}))
    }, [cDataset])

    useEffect(() => {
        if (mlDataset.isRefresh) {
            dispatch(myDatasetList())
        }
    }, [dispatch, mlDataset])

    const renderTable = () => {
        const columns = [
            {
                title: 'Rally datas',
                dataIndex: 'name',
                ellipsis: true,
                render: (text, resource, index) => {
                    const resources = (cDataset?.resources ?? []).filter((item) => (item?.parents ?? []).indexOf(resource?.id) !== -1)
                    if (resources.length === 0)
                        return (
                            <ParentAmountData resource={resource}/>
                        )
                    return (
                        <Tree
                            showLine={{showLeafIcon: false}}
                            defaultExpandAll
                            blockNode
                            switcherIcon={<DownOutlined className={`hidden opacity-0`}/>}
                            className={`-ml-7 bg-transparent`}
                            treeData={[
                                {
                                    title: <ParentAmountData resource={resource}/>,
                                    children: resources.map((item) => {
                                        return {
                                            title: <ChildAmountData resource={item}/>
                                        }
                                    }),
                                },
                            ]}
                        />
                    )
                }
            }
        ]
        return (
            <>
                <Table
                    loading={mlDataset.isLoading}
                    columns={columns}
                    dataSource={cDataset?.resources}
                    pagination={{disabled: true, hideOnSinglePage: true}}
                />
            </>
        )
    }

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
                <Form.Item
                    name="api_id"
                    label="Api"
                    rules={[{required: true}]}
                >
                    <Select
                        showSearch
                        optionFilterProp="children"
                        autoFocus
                        onChange={(api_id) => setApi_id(api_id)}
                    >
                        {(mlApi.data ?? []).map((api, key) =>
                            <Option value={api.id}>{api.name}</Option>
                        )}
                    </Select>
                </Form.Item>
                <Form.Item
                    name="locale"
                    label="Locale"
                >
                    <Select>
                        {locales.map((locale, key) =>
                            <Option value={locale.id}>{locale.name}</Option>
                        )}
                    </Select>
                </Form.Item>
                <Form.Item
                    name="name"
                    label="Name"
                    rules={[{required: true}]}
                >
                    <Input/>
                </Form.Item>
                {api_id && renderTable()}
                <Form.Item
                    hidden={true}
                    name={`amounts`}
                />
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditDatasetForm
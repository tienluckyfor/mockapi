import {Form, Input, Select, Button, Tree, Table,} from 'antd'
import {DownOutlined} from '@ant-design/icons'
import {useDispatch, useSelector} from "react-redux"
import {useEffect, useState} from 'react'
import {apisSelector, myApiList} from "slices/apis"
import {myResourceList} from "slices/resources"
import {datasetsSelector, setDatasetMerge, createDataset} from "slices/datasets"
import {ChildAmountData, ParentAmountData} from "./AmountData"
import {locales} from "./configDataset"

const {Option} = Select;
const CreateDatasetForm = () => {
    const dispatch = useDispatch()
    const {cDataset, amounts} = useSelector(datasetsSelector)
    const {mlApi} = useSelector(apisSelector)
    const [api_id, setApi_id] = useState()

    useEffect(() => {
        dispatch(myApiList())
    }, [])

    useEffect(() => {
        dispatch(myResourceList(api_id))
    }, [api_id])

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
                                    title:
                                        <ParentAmountData resource={resource}/>,
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
                    columns={columns}
                    dataSource={cDataset?.resources}
                    pagination={{disabled: true, hideOnSinglePage: true}}
                />
            </>
        )
    }
    const [form] = Form.useForm()
    form.setFieldsValue({
        amounts,
        locale: 'en_US',
    });

    return (
        <Form
            form={form}
            onFinish={(values) => dispatch(createDataset(values))}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
            layout={`vertical`}
            scrollToFirstError
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
            <div className="flex items-center justify-end mt-3 ">
                <Button
                    onClick={(e) => dispatch(setDatasetMerge(`cDataset`, {isOpen: false}))}
                >
                    Cancel
                </Button>
                <Button
                    className="ml-3"
                    type="primary"
                    htmlType="submit"
                    loading={cDataset.isLoading}
                >
                    Submit
                </Button>
            </div>
        </Form>
    );
};

export default CreateDatasetForm
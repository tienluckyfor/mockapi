import {Form, Input, Select, Tree, Table,} from 'antd'
import {DownOutlined} from '@ant-design/icons'
import {useDispatch, useSelector} from "react-redux"
import {useEffect, } from 'react'
import {apisSelector, listApi} from "slices/apis"
import {listResource} from "slices/resources"
import {datasetsSelector, } from "slices/datasets"
import {ChildAmountData, ParentAmountData} from "./AmountData"
import {locales} from "./configDataset"

const {Option} = Select;
const FormDataset = ({apiId, setApiId, }) => {
    const dispatch = useDispatch()
    const {cDataset, lDataset, } = useSelector(datasetsSelector)
    const {lApi} = useSelector(apisSelector)

    useEffect(() => {
        dispatch(listApi())
    }, [dispatch])

    useEffect(() => {
        if (!apiId) return;
        dispatch(listResource(apiId))
    }, [apiId, dispatch])

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
                    scroll={{ x: true }}
                    loading={lDataset.isLoading}
                    columns={columns}
                    dataSource={cDataset?.resources}
                    pagination={{disabled: true, hideOnSinglePage: true}}
                />
            </>
        )
    }

    return (
        <>
            <Form.Item
                name="api_id"
                label="Api"
                rules={[{required: true}]}
            >
                <Select
                    showSearch
                    optionFilterProp="children"
                    autoFocus
                    onChange={(value) => setApiId(value)}
                >
                    {(lApi.data ?? []).map((api, key) =>
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
            {apiId && renderTable()}
            <Form.Item
                hidden={true}
                name={`amounts`}
            />
        </>
    )
}

export default FormDataset
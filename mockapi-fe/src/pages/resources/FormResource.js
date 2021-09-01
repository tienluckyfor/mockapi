import {Button, Form, Input, Select, Space, Switch} from "antd";
import {PlusOutlined, CloseOutlined, CheckOutlined, ArrowRightOutlined, MinusCircleOutlined}
    from '@ant-design/icons'
import {endpoints, fakerList, fields, fieldTypes} from "./configResource";
import {useSelector} from "react-redux";
import {apisSelector} from "slices/apis";
import {useEffect, useState} from "react";

const {Option, OptGroup} = Select;

const FormResource = ({formValue, resourceName}) => {
    const {mlApi} = useSelector(apisSelector)
    const [rName, setRName] = useState()

    useEffect(() => {
        setRName(resourceName)
    }, [resourceName])

    return (
        <>
            {/*<pre className="text-sm">
                {JSON.stringify(formValue, null, '  ')}
            </pre>*/}
            <Form.Item
                name="api_id"
                label="Api"
                rules={[{required: true}]}
            >
                <Select
                    optionFilterProp="children"
                    autoFocus
                >
                    {(mlApi.data ?? []).map((api, key) =>
                        <Option value={api.id}>{api.name}</Option>
                    )}
                </Select>
            </Form.Item>
            <Form.Item
                name="name"
                label="Name"
                rules={[{required: true}]}
            >
                <Input
                    onChange={(e) => setRName(e.target.value)}
                />
            </Form.Item>
            <section className="">
                <p className="mb-1">
                    <span className="text-red-500 mr-2 text-sm">*</span>
                    Fields</p>
                <Form.Item
                    className={`mb-0`}
                    valuePropName="checked"
                    name={`is_authentication`}
                >
                    <label className="flex items-center space-x-2 mb-2 cursor-pointer">
                        <Switch
                            checkedChildren={<CheckOutlined/>}
                            unCheckedChildren={<CloseOutlined/>}
                            size="small"
                        />
                        <span className="text-gray-500">Is authentication</span>
                    </label>
                </Form.Item>
                <Form.List
                    name="fields"
                    initialValue={fields}
                >
                    {(afields, {add, remove}) => (
                        <>
                            {afields.map(({key, name, fieldKey, ...restField}) => {
                                let field = {}
                                try {
                                    field = formValue?.fields[name]
                                } catch (e) {}
                                return (
                                    <Space
                                        key={key}
                                        className={`h-10`}
                                        style={{display: 'flex', marginBottom: 8}}
                                        align="baseline"
                                    >
                                        <Form.Item
                                            rules={[{required: true, message: `Name is required`}]}
                                            name={[name, `name`]}
                                            fieldKey={[fieldKey, 'name']}
                                        >
                                            <Input
                                                disabled={field?.name === `id`}
                                                placeholder="Name"
                                                autoFocus
                                            />
                                        </Form.Item>
                                        <Form.Item
                                            rules={[{required: true, message: `Type is required`}]}
                                            name={[name, `type`]}
                                            fieldKey={[fieldKey, 'type']}
                                        >
                                            <Select
                                                style={{width: 150}}
                                                disabled={field?.name === `id`}
                                                showSearch
                                            >
                                                {fieldTypes.map((type, k) =>
                                                    <Option value={type}>{type}</Option>
                                                )}
                                            </Select>
                                        </Form.Item>
                                        {field?.type === `Faker.js` && field?.name !== `id` &&
                                        <Form.Item
                                            rules={[{required: true, message: `Fakerjs is required`}]}
                                            name={[name, `fakerjs`]}
                                            fieldKey={[fieldKey, 'fakerjs']}
                                        >
                                            <Select
                                                showSearch
                                                style={{width: 150}}
                                            >
                                                {fakerList.map((faker, k) =>
                                                    <OptGroup label={faker.name} className={`uppercase`}>
                                                        {Object.entries(faker.list).map(([key, item], i) =>
                                                            <Option value={key}>{item}</Option>
                                                        )}
                                                    </OptGroup>
                                                )}
                                            </Select>
                                        </Form.Item>
                                        }
                                        {field?.name !== `id` &&
                                        <Button danger type="link" onClick={() => remove(name)}
                                                icon={<MinusCircleOutlined/>}/>
                                        }
                                    </Space>
                                )
                            })}
                            <Form.Item>
                                <Button type="dashed" onClick={() => add()} icon={<PlusOutlined/>}>
                                    Add field
                                </Button>
                            </Form.Item>
                        </>
                    )}
                </Form.List>
            </section>
            <section className="mt-5">
                <p className="mb-2">
                    <span className="text-red-500 mr-2 text-sm">*</span>
                    Endpoints</p>
                <Form.List name="endpoints" initialValue={endpoints}>
                    {(afields, {add, remove}) => (
                        <>
                            {afields.map(({key, name, fieldKey, ...restField}) => (
                                <>
                                    <div className="flex items-center space-x-2 mb-1">
                                        <Form.Item
                                            className={`mb-0`}
                                            valuePropName="checked"
                                            name={[name, `status`]}
                                            fieldKey={[fieldKey, 'status']}
                                        >
                                            <Switch
                                                checkedChildren={<CheckOutlined/>}
                                                unCheckedChildren={<CloseOutlined/>}
                                                size="small"
                                            />
                                        </Form.Item>
                                        <b className="uppercase text-red-600">{endpoints[fieldKey]?.name}</b>
                                        {(rName && rName.length !== 0) &&
                                        <>
                                            <ArrowRightOutlined/>
                                            {(endpoints[fieldKey]?.type === `get_id` || endpoints[fieldKey]?.type === `delete_id`) &&
                                            <span className="">/{rName}/id</span>
                                            }
                                            {!(endpoints[fieldKey]?.type === `get_id` || endpoints[fieldKey]?.type === `delete_id`) &&
                                            <span className="">/{rName}</span>
                                            }
                                        </>
                                        }
                                    </div>
                                    <Form.Item
                                        name={[name, `type`]}
                                        fieldKey={[fieldKey, 'type']}
                                        className={`hidden m-0 h-px`}
                                    >
                                        <Input/>
                                    </Form.Item>
                                </>
                            ))}
                        </>
                    )}
                </Form.List>
            </section>
        </>
    )
}

export default FormResource
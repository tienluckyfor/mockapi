import {Button, Form, Input, Select, Space, Switch, Checkbox} from "antd";
import {
    PlusOutlined, CloseOutlined, CheckOutlined, ArrowRightOutlined, MinusCircleOutlined,
    MenuOutlined
} from '@ant-design/icons'
import {authFields, endpoints, fakerList, fieldTypes} from "./configResource";
import {useSelector} from "react-redux";
import {apisSelector} from "slices/apis";
import {useEffect, useState} from "react";
import {sortableContainer, sortableElement, sortableHandle} from "react-sortable-hoc";
import debounce from "lodash/debounce"

const {Option, OptGroup} = Select;
const SortableContainer = sortableContainer(({children}) => <ul>{children}</ul>);
const SortableItem = sortableElement(({children}) => <li className="list-none">{children}</li>);
const DragHandle = sortableHandle(() => <MenuOutlined style={{cursor: 'grab', color: '#999'}}/>);

const FormResource = ({formValue, resourceName}) => {
    const {lApi} = useSelector(apisSelector)
    const [rName, setRName] = useState()

    useEffect(() => {
        setRName(resourceName)
    }, [resourceName])

    const debounceChange = debounce(value => {
        setRName(value)
    }, 500)

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
                >
                    {(lApi.data ?? []).map((api, key) =>
                        <Option value={api.id}>{api.name}</Option>
                    )}
                </Select>
            </Form.Item>
            <Form.Item
                name="name"
                label="Name"
                rules={[{required: true},
                    {
                        pattern: /^[a-zA-Z0-9_-]+$/,
                        message: "Must contain only letters, numbers or the underscore!",
                    },]}
            >
                <Input
                    // onChange={(e) => setRName(e.target.value)}
                    onChange={(e) => debounceChange(e.target.value)}
                />
            </Form.Item>
            <section>
                <p className="mb-1">
                    <span className="text-red-500 mr-2 text-sm">*</span>
                    Fields</p>
                <Form.Item
                    className={`mb-2`}
                    valuePropName="checked"
                    name={`is_authentication`}
                >
                    <Checkbox>Is authentication</Checkbox>
                </Form.Item>
                <Form.List
                    name="fields"
                >
                    {(fields, {add, remove, move}) => (
                        <SortableContainer
                            lockAxis="y"
                            useDragHandle
                            onSortEnd={({oldIndex, newIndex}) => move(oldIndex, newIndex)}
                        >
                            {fields.map(({key, name, fieldKey, ...restField}) => {
                                let field = {}
                                try {
                                    field = formValue?.fields[name]
                                } catch (e) {
                                }
                                const isDisabled = field?.name == 'id' || field?.type == 'Authentication'
                                return (
                                    <SortableItem key={key} index={name}>
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
                                                    disabled={isDisabled}
                                                    placeholder="Name"
                                                />
                                            </Form.Item>
                                            <Form.Item
                                                rules={[{required: true, message: `Type is required`}]}
                                                name={[name, `type`]}
                                                fieldKey={[fieldKey, 'type']}
                                            >
                                                <Select
                                                    style={{width: 150}}
                                                    disabled={isDisabled}
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
                                                        <OptGroup label={faker.name}
                                                                  className={`uppercase`}>
                                                            {Object.entries(faker.list).map(([key, item], i) =>
                                                                <Option value={key}>{item}</Option>
                                                            )}
                                                        </OptGroup>
                                                    )}
                                                </Select>
                                            </Form.Item>
                                            }
                                            {!isDisabled &&
                                            <Button danger type="link" onClick={() => remove(name)}
                                                    icon={<MinusCircleOutlined/>}/>
                                            }
                                            <DragHandle/>
                                        </Space>
                                    </SortableItem>
                                )
                            })}
                            <Space>
                                <Button type="dashed" onClick={() => add()} icon={<PlusOutlined/>}>
                                    Add field
                                </Button>
                                {/*<Button type="dashed" onClick={() => add()} icon={<PlusOutlined/>}>
                                    Add relative
                                </Button>*/}
                            </Space>
                        </SortableContainer>
                    )}
                </Form.List>
            </section>
            <section className="mt-5">
                <p className="mb-2">
                    <span className="text-red-500 mr-2 text-sm">*</span>
                    Endpoints</p>
                <Form.List name="endpoints" initialValue={endpoints}>
                    {(fields, {add, remove}) => (
                        <section>
                            {fields.map(({key, name, fieldKey, ...restField}) => (
                                <div>
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
                                            <span>/{rName}/id</span>
                                            }
                                            {!(endpoints[fieldKey]?.type === `get_id` || endpoints[fieldKey]?.type === `delete_id`) &&
                                            <span>/{rName}</span>
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
                                </div>
                            ))}
                        </section>
                    )}
                </Form.List>
            </section>
        </>
    )
}

export default FormResource

export const resourceFieldsChange = (f, allFields, setFormValue) => {
    const fName = f[0].name[0]
    if (fName == 'is_authentication' || fName == 'fields') {
        let formValue = {};
        (allFields ?? []).forEach(item => {
            formValue[item.name] = item.value
        });
        let fields = formValue.fields;
        if (fName == 'is_authentication' && f[0].value) {
            fields = [...authFields, ...formValue.fields]
        }
        if (fName == 'is_authentication' && !f[0].value) {
            fields = (formValue.fields ?? []).filter((item) => item.type != 'Authentication')
        }
        setFormValue({fields})
    }
}
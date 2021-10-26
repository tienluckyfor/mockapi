import {Form, Input, Button, Space, InputNumber} from 'antd';
import {PlusOutlined, MinusCircleOutlined} from '@ant-design/icons'
import {useSelector} from "react-redux";
import {apisSelector} from "slices/apis";

const FormApi = () => {
    const {lApi,} = useSelector(apisSelector)

    const existsValidation = (rule, value, callback) => {
        const names = (lApi.data ?? []).map(item => item.name);
        const regex = new RegExp(`^${value.trim()}$`, "i")
        const withSameValue = names.filter((e) => regex.test(e))
        if (withSameValue.length != 0) {
            rule.message = "API name already exists!";
            callback(rule);
        }
        callback();
    }

    return (
        <>
            <Form.Item
                name="name"
                label="Name"
                rules={[
                    {required: true},
                    {validator: existsValidation},
                ]}
            >
                <Input autoFocus/>
            </Form.Item>
            {/*<section>
                <p className="mb-2">Media thumb sizes (px)</p>

                <Form.List
                    name="thumb_sizes"
                    initialValue={[{width: 90}]}
                >
                    {(fields, {add, remove}) => (
                        <>
                            {(fields ?? []).map(({key, name, fieldKey, ...restField}) => (
                                <Space
                                    key={key}
                                    className={`h-10`}
                                    style={{display: 'flex', marginBottom: 8}}
                                    align="baseline"
                                >
                                    <Form.Item
                                        rules={[{required: true}]}
                                        name={[name, `width`]}
                                        fieldKey={[fieldKey, 'width']}
                                    >
                                        <InputNumber
                                            placeholder="Width"
                                            autoFocus
                                        />
                                    </Form.Item>
                                    &times;
                                    <Form.Item
                                        name={[name, `height`]}
                                        fieldKey={[fieldKey, 'height']}
                                    >
                                        <InputNumber
                                            placeholder="Height"
                                        />
                                    </Form.Item>
                                    <Button type="link" danger onClick={() => remove(name)}
                                            icon={<MinusCircleOutlined/>}/>
                                    <MinusCircleOutlined onClick={() => remove(name)}/>
                                </Space>
                            ))}

                            <Button type="dashed" onClick={() => add()} icon={<PlusOutlined/>}>
                                Add size
                            </Button>
                        </>
                    )}
                </Form.List>
            </section>*/}
        </>
    );
};

export default FormApi
import {Form, Input, Button, Space, InputNumber} from 'antd';
import {PlusOutlined, MinusCircleOutlined} from '@ant-design/icons'

const FormApi = () => {
    return (
        <>
            <Form.Item
                name="name"
                label="Name"
                rules={[{required: true}]}
            >
                <Input autoFocus/>
            </Form.Item>

            <section className="">
                <p className="mb-2">Media thumb sizes (px)</p>

                <Form.List
                    name="thumb_sizes"
                    initialValue={[{width: 90}]}
                >
                    {(fields, {add, remove}) => (
                        <>
                            {(fields??[]).map(({key, name, fieldKey, ...restField}) => (
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
                                    <MinusCircleOutlined onClick={() => remove(name)}/>

                                </Space>
                            ))}

                            <Button type="dashed" onClick={() => add()} icon={<PlusOutlined/>}>
                                Add size
                            </Button>
                        </>
                    )}
                </Form.List>
            </section>
        </>
    );
};

export default FormApi
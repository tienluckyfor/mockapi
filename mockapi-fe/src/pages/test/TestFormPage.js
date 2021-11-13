import React, {useState} from "react";
import {Button, Divider, Form} from "antd";
import {ReactQuillCustom} from "../../components";
const uuid = require('react-uuid')

const TestFormPage = () => {
    const [val, setVal] = useState(null);
    const [form] = Form.useForm();

    return (
        <Form
            form={form}
            onFinish={(values) => {
                console.log('onFinish ', values)
                // setVal(form.getFieldValue('radio'))
            }}
            onFinishFailed={() => setVal(null)}
            layout="vertical"
            className="p-3"
        >
            <Form.Item>
                <Button type="primary" htmlType="submit">Submit</Button>
            </Form.Item>
            <Form.Item
                key={uuid()}
                name="ReactQuillCustom"
                label="ReactQuillCustom">
                <ReactQuillCustom
                    name={`ReactQuillCustom`}
                    onChange={(html) => { }}
                />
            </Form.Item>
        </Form>
    )
}

export default TestFormPage
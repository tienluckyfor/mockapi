import {Modal, Form, Input} from 'antd';
import {useSelector} from "react-redux";
import {apisSelector} from "slices/apis";

const EditApiForm = ({visible, onCreate, onCancel}) => {
    const {eApi} = useSelector(apisSelector)
    const [form] = Form.useForm()
    form.setFieldsValue({
        id: eApi?.api?.id,
        name: eApi?.api?.name
    });

    return (
        <Modal
            visible={visible}
            title="Edit Api"
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
        >
            <Form
                form={form}
                layout="vertical"
            >
                <Form.Item
                    name="name"
                    label="Name"
                    rules={[{ required: true}]}
                >
                    <Input autoFocus/>
                </Form.Item>
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditApiForm
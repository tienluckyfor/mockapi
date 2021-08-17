import {Modal, Form, Input} from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {apisSelector, editApi, setApiMerge} from "slices/apis";
import FormApi from "./FormApi";

const EditApiForm = ({visible,}) => {
    const dispatch = useDispatch()

    const {eApi} = useSelector(apisSelector)
    const [form] = Form.useForm()
    form.setFieldsValue({
        "id": eApi?.api.id,
        "name": eApi?.api.name,
        "thumb_sizes": eApi?.api.thumb_sizes ?? [],
    });

    return (
        <Modal
            visible={visible}
            title="Edit Api"
            okText="Save"
            cancelText="Cancel"
            onCancel={() => dispatch(setApiMerge(`eApi`, {isOpen: false}))}
            onOk={() => {
                form
                    .validateFields()
                    .then((values) => {
                        form.resetFields()
                        dispatch(editApi(values))
                        // onCreate(values)
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
                <FormApi/>
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditApiForm
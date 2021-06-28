import {useRef, useEffect, useState} from 'react'
import {Modal, Form, Input, Select, Space, Button, Switch, Checkbox, Row, Col} from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {resourcesSelector, setResourceMerge} from "slices/resources";

const {Option, OptGroup} = Select;
const {TextArea} = Input;
const CheckboxGroup = Checkbox.Group;
// const plainOptions = ['Apple', 'Pear', 'Orange'];
const defaultCheckedList = ['Apple', 'Orange'];

const EditParentResourceForm = ({visible, onCreate, onCancel}) => {
    const {epResource, mlResource} = useSelector(resourcesSelector)
    const [plainOptions, setPlainOptions] = useState([]);
    const [checkedList, setCheckedList] = useState(defaultCheckedList);

    const [form] = Form.useForm()
    form.setFieldsValue({
        id: epResource?.resource?.id,
        parents: epResource?.resource?.parents,
    });

    useEffect(() => {
        const resources = (mlResource?.data?.resources ?? []).filter((resource) => resource?.id !== epResource?.resource?.id && resource?.api_id === epResource?.resource?.api_id)
        setPlainOptions(resources.map((item) => {
            return {
                label: item.name,
                value: item.id
            }
        }))
    }, [])

    return (
        <Modal
            visible={visible}
            title="Parent Resource"
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
            confirmLoading={epResource.isLoading}
        >
            <Form
                form={form}
                layout="vertical"
            >
                <Form.Item
                    name={`parents`}
                >
                    {/*<CheckboxGroup
                        options={plainOptions}
                        value={checkedList}
                    />*/}
                    <CheckboxGroup>
                        <Space direction={`vertical`}>
                            {plainOptions.map((item) =>
                                <Checkbox value={item.value}>{item.label}</Checkbox>
                            )}
                        </Space>
                    </CheckboxGroup>
                </Form.Item>
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditParentResourceForm
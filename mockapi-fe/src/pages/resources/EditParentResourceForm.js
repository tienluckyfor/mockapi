import {useEffect, useState} from 'react'
import {Modal, Form, Space, Checkbox, Empty} from 'antd';
import {useSelector} from "react-redux";
import {resourcesSelector,} from "slices/resources";

const CheckboxGroup = Checkbox.Group;

const EditParentResourceForm = ({visible, onCreate, onCancel}) => {
    const {epResource, lResource} = useSelector(resourcesSelector)
    const [plainOptions, setPlainOptions] = useState([]);

    const [form] = Form.useForm()
    form.setFieldsValue({
        id: epResource?.resource?.id,
        parents: epResource?.resource?.parents,
    });

    useEffect(() => {
        const resources = (lResource?.data?.resources ?? [])
            .filter((resource) => resource?.id !== epResource?.resource?.id && resource?.api_id === epResource?.resource?.api_id)
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
                {(plainOptions.length === 0) &&
                <Empty image={Empty.PRESENTED_IMAGE_SIMPLE}/>
                }
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
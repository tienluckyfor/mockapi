import React, { Component, Fragment } from 'react';
import ReactDom from 'react-dom';
import { Form, Input, Button, Space } from 'antd';
import { MinusCircleOutlined, PlusOutlined, MenuOutlined } from '@ant-design/icons';
import { sortableContainer, sortableElement, sortableHandle } from 'react-sortable-hoc';
const SortableItem = sortableElement(({ children }) => <li>{children}</li>);
const SortableContainer = sortableContainer(({ children }) => {
    return <ul>{children}</ul>;
});
const DragHandle = sortableHandle(() => <MenuOutlined style={{ cursor: 'grab', color: '#999' }} />);
let App = () => {
    const onFinish = values => {
        console.log('Received values of form:', values);
    };

    return (
        <Form name="dynamic_form_nest_item" onFinish={onFinish} autoComplete="off">
            <Form.List name="users">
                {(fields, { add, remove, move }) => (
                    <SortableContainer
                        lockAxis="y"
                        useDragHandle
                        onSortEnd={({ oldIndex, newIndex }) => move(oldIndex, newIndex)}
                    >
                        {fields.map(({ key, name, fieldKey, ...restField }, index) => (
                            <SortableItem key={key} index={name} >
                                <Space key={key} style={{ display: 'flex', marginBottom: 8 }} align="baseline">
                                    {index}
                                    <Form.Item
                                        {...restField}
                                        name={[name, 'first']}
                                        fieldKey={[fieldKey, 'first']}
                                        rules={[{ required: true, message: 'Missing first name' }]}
                                    >
                                        <Input placeholder="First Name" />
                                    </Form.Item>
                                    <Form.Item
                                        {...restField}
                                        name={[name, 'last']}
                                        fieldKey={[fieldKey, 'last']}
                                        rules={[{ required: true, message: 'Missing last name' }]}
                                    >
                                        <Input placeholder="Last Name" />
                                    </Form.Item>
                                    <MinusCircleOutlined onClick={() => remove(name)} />
                                    <DragHandle />
                                </Space>
                            </SortableItem>
                        ))}
                        <Form.Item>
                            <Button type="dashed" onClick={() => add()} block icon={<PlusOutlined />}>
                                Add field
                            </Button>
                        </Form.Item>
                    </SortableContainer>
                )}
            </Form.List>
            <Form.Item>
                <Button type="primary" htmlType="submit">
                    Submit
                </Button>
            </Form.Item>
        </Form>
    );
}
export default App
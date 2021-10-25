import {Upload, message, Button, Space} from 'antd';
import {UploadOutlined} from '@ant-design/icons';
import React from "react";
import UploadMedia from "../../components/Media/UploadMedia";
import {Divider} from "antd/es";

const props = {
    name: 'file',
    action: 'https://www.mocky.io/v2/5cc8019d300000980a055e76',
    headers: {
        authorization: 'authorization-text',
    },
    onChange(info) {
        if (info.file.status !== 'uploading') {
            console.log(info.file, info.fileList);
        }
        if (info.file.status === 'done') {
            message.success(`${info.file.name} file uploaded successfully`);
        } else if (info.file.status === 'error') {
            message.error(`${info.file.name} file upload failed.`);
        }
    },
};
const TestUpload = () => {
    return (
        <>

            <UploadMedia listType="picture-card" plainOptions={`plainOptions`}>
                <Button type="link" loading={false} icon={<UploadOutlined style={{fontSize: `1.5em`}}/>}/>
                {/*<div style={{marginTop: 8}}>Upload</div>*/}
            </UploadMedia>
            <Divider/>
            <Upload {...props}>
                <Button icon={<UploadOutlined/>}>Click to Upload</Button>
            </Upload>
        </>
    )
}

export default TestUpload

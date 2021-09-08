import React, {useEffect, useState} from 'react';
import {Button, Divider, List, Modal, Tabs} from "antd";
import {useDispatch, useSelector} from "react-redux";
import {datasetsSelector, setDatasetMerge} from "slices/datasets";
import {Share} from "components";
import {CopyBlock, dracula} from "react-code-blocks";
import {apiCodeby} from "./apiCodeby";
import {LinkOutlined} from '@ant-design/icons';

const InfoDatasetModal = () => {
    const dispatch = useDispatch()
    const {modalDataset,} = useSelector(datasetsSelector)
    const listData = [
        {
            title: `Postman Collection`,
            url: modalDataset?.dataset?.postman?.collection ?? ``,
        },
        {
            title: `Postman Environment`,
            url: modalDataset?.dataset?.postman?.environment ?? ``,
        },
        {
            title: `Data Management`,
            url: `${window.location.origin.toString()}/RallydataPage?dataset_id_RD=${modalDataset?.dataset?.id}`,
        },
    ]

    const LinkButton = ({item}) => {
        return <a href={item.url} target={`_blank`}>
            <Button className="px-0" type="link" icon={<LinkOutlined/>}>{item.title}</Button>
        </a>
    }

    const PostmanList = () => {
        return <List
            dataSource={listData}
            renderItem={(item, i) => <List.Item>
                <div className="space-y-2 w-full">
                    <LinkButton item={item}/>
                    {/*<a href={item.url} target={`_blank`} className="block">
                        {item.title}
                    </a>*/}
                    <CopyBlock
                        text={item.url}
                        theme={dracula}
                        showLineNumbers={false}
                        language="javascript"
                    />
                </div>
            </List.Item>
            }
        />
    }

    const ReactJs = () => {
        return <ul className="space-y-4">
            <li className="space-y-2">
                <LinkButton item={{
                    url: "https://www.npmjs.com/package/react-api-codeby",
                    title: "NPM package"
                }}/>
                <CopyBlock
                    text={`npm i react-api-codeby`}
                    theme={dracula}
                    showLineNumbers={false}
                    language="javascript"
                />
            </li>
            <li className="space-y-2">
                <p className="text-gray-600">src/configs/apiCodeby.js</p>
                <CopyBlock
                    text={apiCodeby(modalDataset?.dataset?.postman?.token)}
                    theme={dracula}
                    showLineNumbers={false}
                    language="javascript"
                    codeBlock
                />
            </li>

        </ul>
    }

    return (<Modal
        title={modalDataset?.dataset?.name}
        visible={modalDataset?.visible}
        okButtonProps={{style: {display: 'none'}}}
        closable={false}
        onOk={(e) => dispatch(setDatasetMerge('modalDataset', {visible: false}))}
        onCancel={(e) => dispatch(setDatasetMerge('modalDataset', {visible: false}))}
        cancelText="Close"
    >
        <Share
            data={modalDataset?.dataset}
            shareable_type="App\Models\DataSet"
            shareable_id={modalDataset?.dataset?.id}/>
        <Divider/>
        <Tabs defaultActiveKey="Postman">
            <Tabs.TabPane tab="Postman" key="Postman">
                <PostmanList/>
            </Tabs.TabPane>
            <Tabs.TabPane tab="ReactJs" key="ReactJs">
                <ReactJs/>
            </Tabs.TabPane>
        </Tabs>
    </Modal>)
}

export default InfoDatasetModal
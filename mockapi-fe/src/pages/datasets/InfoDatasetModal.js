import React from 'react';
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
            title: `Token`,
            text: modalDataset?.dataset?.postman?.token,
        },
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

    const GeneralList = () => {
        return <List
            dataSource={listData}
            renderItem={(item, i) => <List.Item>
                <div className="space-y-2 w-full">
                    {item.url &&
                    <LinkButton item={item}/>
                    }
                    {item.text &&
                    <Button className="px-0" type="link" danger>{item.title}</Button>
                    }
                    <CopyBlock
                        text={item.url ?? item.text}
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

    const Laravel = () => {
        return <ul className="space-y-4">
            <li className="space-y-2">
                <LinkButton item={{
                    url: "https://www.npmjs.com/package/react-api-codeby",
                    title: "Composer package"
                }}/>
                <CopyBlock
                    text={`composer require laravel-api-codeby`}
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
        <Tabs defaultActiveKey="General">
            <Tabs.TabPane tab="General" key="General">
                <GeneralList/>
            </Tabs.TabPane>
            <Tabs.TabPane tab="ReactJs" key="ReactJs">
                <ReactJs/>
            </Tabs.TabPane>
            <Tabs.TabPane tab="Laravel" key="Laravel">
                <Laravel/>
            </Tabs.TabPane>
        </Tabs>
    </Modal>)
}

export default InfoDatasetModal
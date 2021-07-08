import React, {useEffect, useState} from 'react';
import {Button, Divider, List, Modal,} from "antd";
import {CopyOutlined, CheckOutlined, } from '@ant-design/icons';
import {CopyToClipboard} from "react-copy-to-clipboard";
import {useDispatch, useSelector} from "react-redux";
import {datasetsSelector, setDatasetMerge} from "slices/datasets";
import {commonsSelector, setCommonMerge} from "slices/commons";
import {Share} from "components";

const InfoDatasetModal = () => {
    const dispatch = useDispatch()
    const {modalDataset,} = useSelector(datasetsSelector)
    const {copied} = useSelector(commonsSelector)

    const [visible, setVisible] = useState()
    const [dataset, setDataset] = useState({})
    const [listData, setListData] = useState([])

    useEffect(() => {
        setVisible(modalDataset?.visible)
        setDataset(modalDataset?.dataset)
    }, [modalDataset])

    useEffect(() => {
        if (!dataset?.api_url) return;
        const listData = [
            {
                title: `Postman Collection`,
                url: dataset?.postman?.collection,
            },
            {
                title: `Postman Environment`,
                url: dataset?.postman?.environment,
            },
        ]
        setListData(listData)
    }, [dataset])

    const renderList = () => {
        return <List
            dataSource={listData}
            renderItem={(item, i) => (
                <List.Item>
                    <List.Item.Meta
                        title={<a href={item.url} target={`_blank`}>{item.title}</a>}
                        description={<div className="flex items-center justify-between">
                            <a href={item.url} target={`_blank`} className="block w-64 truncate">
                                {item.url.replace(/^.+?(\/api.+?)$/, '...$1')}
                            </a>
                            <CopyToClipboard
                                text={item.url}
                                onCopy={() => dispatch(setCommonMerge(`copied`, {[i]: true}))}
                            >
                                <Button
                                    size={`small`}
                                    type={copied[i] ? `primary` : `dashed`}
                                    icon={copied[i] ? <CheckOutlined/> : <CopyOutlined/>}
                                />
                            </CopyToClipboard>
                        </div>}
                    />
                </List.Item>
            )}
        />
    }

    return (<Modal
        title={dataset?.name}
        visible={visible}
        cancelButtonProps={{style: {display: 'none'}}}
        onOk={(e) => dispatch(setDatasetMerge('modalDataset', {visible: false}))}
        onCancel={(e) => dispatch(setDatasetMerge('modalDataset', {visible: false}))}
    >
        <Share type="dataset" type_id={dataset?.id}/>
        <Divider/>
        {renderList()}
    </Modal>)
}

export default InfoDatasetModal
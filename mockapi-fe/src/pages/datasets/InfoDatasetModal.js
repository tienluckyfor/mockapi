import React, {useEffect, useState} from 'react';
import {Button, Divider, List, Modal,} from "antd";
import {CopyOutlined, CheckOutlined,} from '@ant-design/icons';
import {CopyToClipboard} from "react-copy-to-clipboard";
import {useDispatch, useSelector} from "react-redux";
import {datasetsSelector, setDatasetMerge} from "slices/datasets";
import {commonsSelector, setCommonMerge} from "slices/commons";
import {Share} from "components";

const InfoDatasetModal = () => {
    const dispatch = useDispatch()
    const {modalDataset,} = useSelector(datasetsSelector)
    const {copied} = useSelector(commonsSelector)

    // const [listData, setListData] = useState([])
    // useEffect(() => {
    //     const listData = [
    //         {
    //             title: `Postman Collection`,
    //             url: modalDataset?.dataset?.postman?.collection ?? ``,
    //         },
    //         {
    //             title: `Postman Environment`,
    //             url: modalDataset?.dataset?.postman?.environment ?? ``,
    //         },
    //     ]
    //     setListData(listData)
    // }, [modalDataset])

    const listData = [
        {
            title: `Data Management`,
            url: `${window.location.origin.toString()}/RallydataPage?dataset_id_RD=${modalDataset?.dataset?.id}`,
        },
        {
            title: `Postman Collection`,
            url: modalDataset?.dataset?.postman?.collection ?? ``,
        },
        {
            title: `Postman Environment`,
            url: modalDataset?.dataset?.postman?.environment ?? ``,
        },
    ]

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
        title={modalDataset?.dataset?.name}
        visible={modalDataset?.visible}
        okButtonProps={{style: {display: 'none'}}}
        closable={false}
        onOk={(e) => dispatch(setDatasetMerge('modalDataset', {visible: false}))}
        onCancel={(e) => dispatch(setDatasetMerge('modalDataset', {visible: false}))}
        cancelText="Close"
    >
        <Share
            shareable_type="App\Models\DataSet"
            shareable_id={modalDataset?.dataset?.id}/>
        <Divider/>
        {renderList()}
    </Modal>)
}

export default InfoDatasetModal
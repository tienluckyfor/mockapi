import React from 'react';
import {Modal,} from "antd";
import {useDispatch, useSelector} from "react-redux";
import {apisSelector, setApiMerge} from "slices/apis";
import {Share} from "components";

const InfoApiModal = () => {
    const dispatch = useDispatch()
    const {modalApi,} = useSelector(apisSelector)

    return (<Modal
        title={modalApi?.api?.name}
        visible={modalApi?.visible}
        okButtonProps={{style: {display: 'none'}}}
        closable={false}
        onOk={(e) => dispatch(setApiMerge('modalApi', {visible: false}))}
        onCancel={(e) => dispatch(setApiMerge('modalApi', {visible: false}))}
        cancelText="Close"
    >
        <Share
            data={modalApi?.api}
            shareable_type="App\Models\Api"
            shareable_id={modalApi?.api?.id}/>
    </Modal>)
}

export default InfoApiModal
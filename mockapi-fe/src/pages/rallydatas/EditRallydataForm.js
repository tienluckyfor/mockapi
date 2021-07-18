import {Form, Modal,} from 'antd';
import React, {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {rallydatasSelector, setRallydataMerge, } from "slices/rallydatas";
import {MediaModal} from "components";
import ModalChildRallydata from "./ModalChildRallydata";
import FormRallydata from "./FormRallydata";
import {getItype, getRallyData} from "./configRallydata";
import moment from "moment"
import "moment-timezone";
import {mediaSelector, setMediaMerge} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";

const EditRallydataForm = ({fields, visible, onCreate, onCancel}) => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {eRallydata, dataset_id_RD, resource_id_RD, mRallydataData, deRallydata} = useSelector(rallydatasSelector)
    const [form] = Form.useForm()
    const {mlMedia, } = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)

    useEffect(() => {
        const rally = eRallydata.rallydata
        let fieldsValue = {id: rally.originalId, data: {}};
        (fields ?? []).map((field) => {
            const {name, type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            fieldsValue.data[name] = rally[name]
            if (iType === `Date`) {
                fieldsValue.data[name] = moment(rally[name])
            }
            if (iType === `Media`) {
                dispatch(setCommonMerge('checkedList', {[name]: rally[name]?.media_ids}))
            }
            if (iType === `Resource`) {
                const rallyIds = (rally[name] ?? []).map((item) => item.id)
                dispatch(setCommonMerge('checkedList', {[name]: rallyIds}))
            }
        })
        form.setFieldsValue(fieldsValue)
    }, [eRallydata])

    useEffect(() => {
        if (!(dataset_id_RD && resource_id_RD && fields)) return;
        let fieldsValue = {
            "dataset_id": dataset_id_RD,
            "resource_id": resource_id_RD,
            "data": {}
        };
        form.setFieldsValue(fieldsValue)

    }, [dataset_id_RD, resource_id_RD, fields])

    useEffect(() => {
        // media
        const fmedia = (fields ?? []).filter((field) => {
            const {name, type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            return iType === "Media"
        })
        let fieldsValue = form.getFieldsValue()
        for (const key in fmedia) {
            const f = fmedia[key]
            const mediaR = (mlMedia.data ?? []).filter((medium) => checkedList[f.name] && checkedList[f.name].indexOf(medium.id) !== -1)
            dispatch(setMediaMerge('cbMedia', {[f.name]: mediaR}))
            fieldsValue.data[f.name] = {
                type: 'media',
                media_ids: mediaR.map((medium) => medium.id)
            }
        }
        // children
        fieldsValue.data_children = []
        for (const key in childResources) {
            const r = childResources[key]
            const childrenR = getRallyData(mRallydataData, r.id).filter((rally) => checkedList[r.name] && checkedList[r.name].indexOf(rally.data.id) !== -1)
            dispatch(setRallydataMerge('cbRallydata', {[r.name]: childrenR}))
            fieldsValue.data_children.push({
                type: 'rallydata',
                resource_id: r.id,
                rallydata_ids: childrenR.map((rally) => rally.id)
            })
        }
        form.setFieldsValue(fieldsValue)
    }, [checkedList, mlMedia])

    const [childResources, setChildResources] = useState([])
    useEffect(() => {
        const resources = (deRallydata?.data?.resources ?? []).filter((item) => (item?.parents ?? []).indexOf(parseInt(resource_id_RD)) !== -1)
        setChildResources(resources)
    }, [deRallydata])

    const [dataEditor, setDataEditor] = useState({})
    useEffect(() => {
        let dataEditor = {};
        (fields ?? []).filter((field) => {
            const {name, type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            if(['Object', 'Array', 'LongText'].includes(iType)){
                dataEditor[name] = eRallydata.rallydata[name]
            }
        })
        setDataEditor(dataEditor)
    }, [eRallydata, deRallydata])

    return (
        <Modal
            title={<h2>Edit Rallydata</h2>}
            visible={visible}
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
            width={750}
            confirmLoading={eRallydata.isLoading}
        >
            <Form
                form={form}
                layout={`vertical`}
            >
                <MediaModal/>
                <ModalChildRallydata/>
                <FormRallydata
                    fields={fields}
                    form={form}
                    childResources={childResources}
                    dataEditor={dataEditor}
                />
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditRallydataForm
import {Form, Modal,} from 'antd';
import React, {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {editRallydata, rallydatasSelector, setRallydataMerge,} from "slices/rallydatas";
import {MediaModal} from "components";
import ModalChildRallydata from "./ModalChildRallydata";
import FormRallydata from "./FormRallydata";
import {getItype, getRallyData, handleValues} from "./configRallydata";
import moment from "moment"
import "moment-timezone";
import {mediaSelector, setMediaMerge} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import {error} from "services";

const EditRallydataForm = ({fields, visible, onCreate, onCancel}) => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {eRallydata, dataset_id_RD, resource_id_RD, mRallydataData, deRallydata} = useSelector(rallydatasSelector)
    const [form] = Form.useForm()
    const {mlMedia,} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)

    useEffect(() => {
        if (eRallydata.firstCount == 0) {
            const rally = eRallydata.rallydata
            let fieldsValue = {id: rally.originalId, data: {}, is_show: rally._is_show, is_pin: rally._is_pin,};
            // (fields ?? []).map((field) => {
            (fields ?? []).forEach((field) => {
                const {name, type, fakerjs} = field
                const iType = getItype(type, fakerjs)
                fieldsValue.data[name] = rally[name]
                if (iType === `Object` || iType === 'Array') {
                    fieldsValue.data[name] = JSON.stringify(rally[name], null, '  ')
                }
                if (iType === `Date`) {
                    fieldsValue.data[name] = moment(rally[name])
                }
                if (iType === `Media`) {
                    dispatch(setCommonMerge('checkedList', {[`edit-${name}`]: rally[name]?.media_ids}))
                }
                if (iType === `Resource`) {
                    delete fieldsValue.data[name]
                    const rallyIds = (rally[name] ?? []).map((item) => item.id)
                    dispatch(setCommonMerge('checkedList', {[`edit-${name}`]: rallyIds}))
                }
            })
            form.setFieldsValue(fieldsValue)
            dispatch(setRallydataMerge('eRallydata', {firstCount: eRallydata.firstCount + 1}))
        }

        if (!eRallydata.isOpen) {
            form.resetFields();
        }
    }, [eRallydata, dispatch, form, fields])

    useEffect(() => {
        if (!(dataset_id_RD && resource_id_RD && fields)) return;
        let fieldsValue = {
            "dataset_id": dataset_id_RD,
            "resource_id": resource_id_RD,
            "data": {}
        };
        form.setFieldsValue(fieldsValue)
    }, [dataset_id_RD, resource_id_RD, fields, form])

    const [childResources, setChildResources] = useState([])

    useEffect(() => {
        // media
        const fmedia = (fields ?? []).filter((field) => {
            const {type, fakerjs} = field
            const iType = getItype(type, fakerjs)
            return iType === "Media"
        })
        let fieldsValue = form.getFieldsValue()
        for (const key in fmedia) {
            const f = fmedia[key]
            const fName = `edit-${f.name}`
            const mediaR = (mlMedia.data ?? []).filter((medium) => {
                return checkedList[fName]
                    && (checkedList[fName].indexOf(medium.id) !== -1)
            })
            dispatch(setMediaMerge('cbMedia', {[fName]: mediaR}))
            fieldsValue.data[f.name] = {
                type: 'media',
                media_ids: mediaR.map((medium) => medium.id)
            }
        }
        // children
        fieldsValue.data_children = []
        for (const key in childResources) {
            const r = childResources[key]
            const fName = `edit-${r.name}`
            const childrenR = getRallyData(mRallydataData, r.id).filter((rally) => checkedList[fName] && checkedList[fName].indexOf(rally.data.id) !== -1)
            dispatch(setRallydataMerge('cbRallydata', {[fName]: childrenR}))
            fieldsValue.data_children.push({
                type: 'rallydata',
                resource_id: r.id,
                rallydata_ids: childrenR.map((rally) => rally.id)
            })
        }
        form.setFieldsValue(fieldsValue)
    }, [checkedList, mlMedia, dispatch, fields, form, mRallydataData, childResources ])

    useEffect(() => {
        const resources = (deRallydata?.data?.resources ?? []).filter((item) => (item?.parents ?? []).indexOf(parseInt(resource_id_RD)) !== -1)
        setChildResources(resources)
    }, [deRallydata, resource_id_RD])

    return (
        <Modal
            title={<h2>Edit Rallydata</h2>}
            visible={visible}
            onCancel={() => {
                dispatch(setRallydataMerge(`eRallydata`, {isOpen: false}))
            }}
            onOk={() => {
                form
                    .validateFields()
                    .then((values) => {
                        const vals = handleValues(fields, values)
                        if (vals === null) {
                            error('The JSON field is not a valid format!')
                            return
                        }
                        // console.log('vals', vals)
                        // return;
                        dispatch(editRallydata(vals))
                        // form.resetFields()
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
                    from={'edit'}
                    childResources={childResources}
                    // dataEditor={dataEditor}
                />
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditRallydataForm
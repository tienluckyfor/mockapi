import {Form, Button, Space, Select, Modal,} from 'antd';
import React, {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {rallydatasSelector, setRallydataMerge, createRallydata} from "slices/rallydatas";
import {MediaModal} from "components";
import ModalChildRallydata from "./ModalChildRallydata";
import FormRallydata from "./FormRallydata";
import {getItype, getRallyData} from "./configRallydata";
import moment from "moment";
import {mediaSelector, myMediaList, setMediaMerge} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";

const EditRallydataForm = ({fields, visible, onCreate, onCancel}) => {
    moment.tz.setDefault(process.env.REACT_APP_TIME_ZONE)

    const dispatch = useDispatch()
    const {eRallydata, dataset_id_RD, resource_id_RD, mRallydataData, deRallydata} = useSelector(rallydatasSelector)
    const [form] = Form.useForm()
    const {mlMedia, mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)
    // useEffect(() => {
    //     form.setFieldsValue(eRallydata.rallydata)
    //     console.log('11')
    // }, [eRallydata])


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
        // (fields ?? []).map((field) => {
        //     const {name, type, fakerjs} = field
        //     const iType = getItype(type, fakerjs)
        //     if (iType === `Date`) {
        //         fieldsValue.data[name] = moment()
        //     }
        // })
        form.setFieldsValue(fieldsValue)
        // console.log('myMediaList dataset_id_RD',  dataset_id_RD)

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
            console.log('getRallyData(mRallydataData, r.id)', getRallyData(mRallydataData, r.id))
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
            {/*<pre className="text-sm">
                {JSON.stringify(eRallydata.rallydata, null, '  ')}
            </pre>*/}
            <Form
                form={form}
                layout={`vertical`}
                // onFinish={(values) => dispatch(createRallydata(values))}
                // className="border border-indigo-200 p-4 mt-4 rounded-sm"
            >
                <MediaModal/>
                <ModalChildRallydata/>
                <FormRallydata
                    fields={fields}
                    form={form}
                    childResources={childResources}
                />
                {/*<div className="flex items-center justify-end mt-3 ">
                    <Button
                        onClick={(e) => dispatch(setRallydataMerge(`cRallydata`, {isOpen: false}))}
                    >
                        Cancel
                    </Button>
                    <Button
                        className="ml-3"
                        type="primary"
                        htmlType="submit"
                        loading={cRallydata.isLoading}
                    >
                        Submit
                    </Button>
                </div>*/}
                <Form.Item hidden={true} name="id"/>
            </Form>
        </Modal>
    );
};

export default EditRallydataForm
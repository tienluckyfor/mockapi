import {Form, Input, Button, DatePicker, InputNumber, Switch, Checkbox, Image, Space} from 'antd';
import React, {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getItype, getRallyData} from "./configRallydata";
import moment from 'moment';
import {rallydatasSelector, setRallydataMerge, createRallydata} from "slices/rallydatas";
import {MediaModal} from "components";
import {mediaSelector, setMediaMerge,} from "slices/media";
import {commonsSelector,} from "slices/commons";
import ModalChildRallydata from "./ModalChildRallydata";
import FormRallydata from "./FormRallydata";

const CreateRallydataForm = ({fields}) => {
    const dispatch = useDispatch()
    const {cRallydata, dataset_id_RD, resource_id_RD, deRallydata, mRallydataData, cbRallydata, fieldsRallydata} = useSelector(rallydatasSelector)
    const {mlMedia, mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)

    const [form] = Form.useForm()
    /*
        useEffect(() => {
            if (!(dataset_id_RD && resource_id_RD && fields)) return;
            let fieldsValue = {
                "dataset_id": dataset_id_RD,
                "resource_id": resource_id_RD,
                "data": {}
            };
            (fields ?? []).map((field) => {
                const {name, type, fakerjs} = field
                const iType = getItype(type, fakerjs)
                if (iType === `Date`) {
                    fieldsValue.data[name] = moment()
                }
            })
            form.setFieldsValue(fieldsValue)
        }, [dataset_id_RD, resource_id_RD, fields])

        useEffect(() => {
            // media
            const fmedia = (fields ?? []).filter((field) => {
                const {name, type, fakerjs} = field
                const iType = getItype(type, fakerjs)
                return iType === "Media"
            })
            let values = form.getFieldsValue()
            for (const key in fmedia) {
                const f = fmedia[key]
                const mediaR = (mlMedia.data ?? []).filter((medium) => checkedList[f.name] && checkedList[f.name].indexOf(medium.id) !== -1)
                dispatch(setMediaMerge('cbMedia', {[f.name]: mediaR}))
                values.data[f.name] = {
                    type: 'media',
                    media_ids: mediaR.map((medium) => medium.id)
                }
            }

            // children
            values.data_children = []
            for (const key in childResources) {
                const r = childResources[key]
                const childrenR = getRallyData(mRallydataData, r.id).filter((rally) => checkedList[r.name] && checkedList[r.name].indexOf(rally.data.id) !== -1)
                dispatch(setRallydataMerge('cbRallydata', {[r.name]: childrenR}))
                values.data_children.push({
                    type: 'rallydata',
                    resource_id: r.id,
                    rallydata_ids: childrenR.map((rally) => rally.id)
                })
            }
            form.setFieldsValue(values)
        }, [checkedList])

        const [childResources, setChildResources] = useState([])
        useEffect(() => {
            const resources = (deRallydata?.data?.resources ?? []).filter((item) => (item?.parents ?? []).indexOf(resource_id_RD) !== -1)
            setChildResources(resources)
        }, [deRallydata])*/

    return (
        <Form
            form={form}
            layout={`vertical`}
            onFinish={(values) => dispatch(createRallydata(values))}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
        >
            <MediaModal/>
            <ModalChildRallydata/>
            <FormRallydata
                fields={fields}
                form={form}
                // setFieldsValue={(values) => form.setFieldsValue(values)}
            />
            <div className="flex items-center justify-end mt-3 ">
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
            </div>
        </Form>
    );
};

export default CreateRallydataForm
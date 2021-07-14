import {useEffect, useState,} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {
    rallydatasSelector, setRallydata, myRallydataList,
    setRallydataMerge, editRallydata, setFieldsRallydata
} from "slices/rallydatas";

import {Loading} from "components";
import CreateRallydataForm from "./CreateRallydataForm";
import EditRallydataForm from "./EditRallydataForm";
import HeaderRallydata from "./HeaderRallydata";
import RenderTableRallydata from "./RenderTableRallydata";
import {getURLParams} from "services";
import {usersSelector} from "slices/users";
import AppHelmet from "shared/AppHelmet";

const RallydataPage = () => {
    const dispatch = useDispatch()
    const {deRallydata, dataset_id_RD, resource_id_RD, cRallydata, eRallydata, mlDRRallydata, fieldsRallydata} = useSelector(rallydatasSelector)
    const {qMe} = useSelector(usersSelector)

    useEffect(() => {
        dispatch(setFieldsRallydata())
    }, [deRallydata, resource_id_RD])

    useEffect(() => {
        dispatch(myRallydataList())
    }, [dataset_id_RD, resource_id_RD])

    useEffect(() => {
        if (mlDRRallydata.isRefresh) {
            dispatch(myRallydataList())
        }
    }, [mlDRRallydata])

    const url = getURLParams()
    useEffect(() => {
        if (dataset_id_RD == url.dataset_id_RD) return;
        dispatch(setRallydata({
            dataset_id_RD: url.dataset_id_RD,
            resource_id_RD: url.resource_id_RD,
        }))
    }, [url])

    const [seoTitle, setSeoTitle] = useState()
    useEffect(() => {
        const datasets = (qMe?.data?.datasets ?? []).filter((item) => item.id == dataset_id_RD)
        const resources = (deRallydata?.data?.resources ?? []).filter((item) => item.id == resource_id_RD)
        const seoTitle = [datasets[0]?.name, resources[0]?.name].join(', ')
        setSeoTitle(seoTitle)
    }, [dataset_id_RD, resource_id_RD, qMe, deRallydata])

    return (
        <>
            <AppHelmet title={seoTitle}/>
            <HeaderRallydata/>
            {mlDRRallydata.isLoading && mlDRRallydata.data &&
            <Loading/>
            }
            {!(mlDRRallydata.isLoading && mlDRRallydata.data) &&
            <>
                {cRallydata['isOpen'] &&
                <CreateRallydataForm fields={fieldsRallydata[resource_id_RD]}/>
                }
                {eRallydata.isOpen &&
                <EditRallydataForm
                    fields={fieldsRallydata[resource_id_RD]}
                    visible={true}
                    onCreate={(values) => dispatch(editRallydata(values))}
                    onCancel={() => {
                        dispatch(setRallydataMerge(`eRallydata`, {isOpen: false}))
                    }}
                />
                }
                <RenderTableRallydata
                    mlDRRallydata={mlDRRallydata}
                    fieldsRallydata={fieldsRallydata[resource_id_RD]}
                />
            </>
            }
        </>
    )
}
export default RallydataPage
import {useEffect, useState,} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {
    rallydatasSelector, myRallydataList, setFieldsRallydata,
} from "slices/rallydatas";
import {Loading} from "components";
import CreateRallydataForm from "./CreateRallydataForm";
import EditRallydataForm from "./EditRallydataForm";
import HeaderRallydata from "./HeaderRallydata";
import RenderTableRallydata from "./RenderTableRallydata";
import {usersSelector} from "slices/users";
import AppHelmet from "shared/AppHelmet";;

const RallydataPage = () => {
    const dispatch = useDispatch()
    const {deRallydata, dataset_id_RD, resource_id_RD, cRallydata, eRallydata, mlDRRallydata, fieldsRallydata} = useSelector(rallydatasSelector)
    const {qMe} = useSelector(usersSelector)

    useEffect(() => {
        dispatch(setFieldsRallydata())
    }, [deRallydata, resource_id_RD])

    useEffect(() => {
        if (dataset_id_RD && resource_id_RD) {
            dispatch(myRallydataList())
        }
    }, [dataset_id_RD, resource_id_RD])

    useEffect(() => {
        if (dataset_id_RD && resource_id_RD && mlDRRallydata.isRefresh) {
            dispatch(myRallydataList(false))
        }
    }, [mlDRRallydata])

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
                    /*onCreate={(values) => {
                        const vals = handleValues(fieldsRallydata[resource_id_RD], values)
                        if (vals === null) {
                            error('The JSON field is not a valid format!')
                            return
                        }
                        dispatch(editRallydata(vals))
                    }}*/
                    /*onCancel={() => {
                        dispatch(setRallydataMerge(`eRallydata`, {isOpen: false}))
                    }}*/
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
import {useEffect, useState} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {useLocation} from "react-router-dom";
import {
    rallydatasSelector,
    setRallydata,
    myRallydataList,
    setRallydataMerge, editRallydata, setFieldsRallydata
} from "slices/rallydatas";

import {Loading} from "components";
import CreateRallydataForm from "./CreateRallydataForm";
import EditRallydataForm from "./EditRallydataForm";
import HeaderRallydata from "./HeaderRallydata";
import RenderTableRallydata from "./RenderTableRallydata";

const RallydataPage = ({match}) => {
    const dispatch = useDispatch()
    const {deRallydata, dataset_id_RD, resource_id_RD, cRallydata, eRallydata, mlDRRallydata, fieldsRallydata} = useSelector(rallydatasSelector)
    const location = useLocation()

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

    useEffect(() => {
        dispatch(setRallydata({
            dataset_id_RD: match.params?.dataset_id,
            resource_id_RD: null,
        }))
    }, [location])

    return (
        <>
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
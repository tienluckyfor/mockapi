import {Checkbox, Modal,} from "antd";
import {rallydatasSelector, setRallydataMerge,} from "slices/rallydatas";
import {commonsSelector, onChange} from "slices/commons";
import {useDispatch, useSelector} from "react-redux";
import {useEffect} from "react"
import RenderTableRallydata from "./RenderTableRallydata";
import {getRallyData} from "./configRallydata";

const CheckboxGroup = Checkbox.Group;

const ModalChildRallydata = () => {
    const dispatch = useDispatch()
    const {mRallydata} = useSelector(rallydatasSelector)
    const {mRallydataData, fieldsRallydata} = useSelector(rallydatasSelector)
    const {checkedList,} = useSelector(commonsSelector)

    useEffect(() => {
        console.log('useEffect checkedList', checkedList)
    }, [checkedList])

    return (<Modal
        title={mRallydata?.resource?.name}
        visible={mRallydata?.visible}
        cancelButtonProps={{style: {display: 'none'}}}
        onOk={(e) => dispatch(setRallydataMerge('mRallydata', {visible: !mRallydata.visible}))}
        onCancel={(e) => dispatch(setRallydataMerge('mRallydata', {visible: !mRallydata.visible}))}
        width={1000}
    >
        <div className="h-96 overflow-y-auto ">
            <div className="">
                <CheckboxGroup
                    value={checkedList[mRallydata?.resource?.name]}
                    onChange={(list) => {
                        console.log('CheckboxGroup checkedList', checkedList)
                        dispatch(onChange(mRallydata?.resource?.name, list))
                        console.log('CheckboxGroup checkedList 1', checkedList)
                    }}
                >
                    <RenderTableRallydata
                        typeShow="checkbox"
                        mlDRRallydata={{data: getRallyData(mRallydataData, mRallydata?.resource?.id)}}
                        fieldsRallydata={fieldsRallydata[mRallydata?.resource?.id]}
                    />
                </CheckboxGroup>
            </div>
        </div>
    </Modal>)
}
export default ModalChildRallydata
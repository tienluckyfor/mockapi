import {Checkbox, Modal,} from "antd";
import {rallydatasSelector, setRallydataMerge,} from "slices/rallydatas";
import {commonsSelector, commonOnCheck} from "slices/commons";
import {useDispatch, useSelector} from "react-redux";
import {useEffect, useState} from "react"
import RenderTableRallydata from "./RenderTableRallydata";
import {getRallyData} from "./configRallydata";

const CheckboxGroup = Checkbox.Group;

const ModalChildRallydata = () => {
    const dispatch = useDispatch()
    const {mRallydata} = useSelector(rallydatasSelector)
    const {mRallydataData, fieldsRallydata} = useSelector(rallydatasSelector)
    const {checkedList,} = useSelector(commonsSelector)

    const [rallies, setRallies] = useState([])
    const [plainOptions, setPlainOptions] = useState([])

    useEffect(() => {
        const rallies = getRallyData(mRallydataData, mRallydata?.resource?.id)
        const plainOptions = rallies.map((item) => item.id)
        setRallies(rallies)
        setPlainOptions(plainOptions)
    }, [mRallydataData, mRallydata])

    return (<Modal
        title={mRallydata?.resource?.name}
        visible={mRallydata?.visible}
        cancelButtonProps={{style: {display: 'none'}}}
        onOk={(e) => dispatch(setRallydataMerge('mRallydata', {visible: !mRallydata.visible}))}
        onCancel={(e) => dispatch(setRallydataMerge('mRallydata', {visible: !mRallydata.visible}))}
        width={1000}
    >
        <div className="h-96 overflow-y-auto ">
            <div>
                <CheckboxGroup
                    value={checkedList[mRallydata?.resource?.fName]}
                    onChange={(list) => {
                        dispatch(commonOnCheck(mRallydata?.resource?.fName, plainOptions, list))
                    }}
                >
                    <RenderTableRallydata
                        typeShow="checkbox"
                        mlDRRallydata={{data: rallies}}
                        fieldsRallydata={fieldsRallydata[mRallydata?.resource?.id]}
                        // resourceName={mRallydata?.resource?.fName}
                    />
                </CheckboxGroup>
            </div>
        </div>
    </Modal>)
}
export default ModalChildRallydata
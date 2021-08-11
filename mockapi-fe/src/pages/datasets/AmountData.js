import {Progress, Tooltip, Popover, Button, Space, Upload} from "antd";
import {DownloadOutlined, UploadOutlined} from '@ant-design/icons';
import {useState, useRef, useEffect} from "react"
import {useDispatch, useSelector} from "react-redux";
import {datasetsSelector, myDatasetList, setDataset} from "slices/datasets";
import {objToUrlParams, resfulClient} from "services";
import {myRallydataList, rallydatasSelector} from "slices/rallydatas";
import {mediaSelector, uploadFile} from "../../slices/media";

const Amount = ({value}) => (
    <span
        className="absolute absolute-x absolute-y bg-white px-1 text-xs">
        {value}
    </span>
)

export const ParentAmountData = ({resource}) => {
    const dispatch = useDispatch()
    const {countChangeRally, amounts, eDataset} = useSelector(datasetsSelector)
    const {resource_id_RD} = useSelector(rallydatasSelector)
    const {uMedia} = useSelector(mediaSelector)
    const [offsetX, setOffsetX] = useState(null)
    const [percent, setPercent] = useState(null)
    const MoveButton = useRef(null)

    const widthToPercent = (e) => {
        const l = MoveButton.current.getBoundingClientRect().left
        const r = MoveButton.current.getBoundingClientRect().right
        const cX = e.clientX
        const x1 = cX - l
        if (cX > r) return 0;
        setOffsetX(x1 - 3)
        const percent1 = (cX - l) / (r - l) * 100
        return parseInt(percent1)
    }

    const content = (
        <div>
            {resource.fields.map((field, key) => <p key={key}>{field.name}</p>)}
        </div>
    )

    const [amount, setAmount] = useState()
    useEffect(() => {
        const amount = amounts && amounts[resource.id] ? amounts[resource.id] : 0;
        setAmount(amount)
        // const amount = cDataset?.amounts && cDataset?.amounts[resource.id] ? cDataset?.amounts[resource.id] : 0;
    }, [amounts])

    useEffect(() => {
        if(uMedia.data){
            dispatch(myDatasetList())
            dispatch(myRallydataList(false))
        }
    }, [uMedia])


    const UploadFile = ({children, ...props}) => {
        const customRequest = async (options) => {
            const formData = new FormData()
            formData.append('file', options.file)
            formData.append('dataset_id', eDataset?.dataset?.id)
            formData.append('resource_id', resource_id_RD)
            formData.append('source', 'ant-upload')
            formData.append('uid', options.file.uid)
            dispatch(uploadFile(formData));
            // const res = await resfulClient.post('/api/rally_backup/import', formData)
            // console.log('res', res)
            // if (res?.data?.id) {
            //     // const list = checkedList[mMedia?.name] ?? []
            //     // checkedList1 = [...list, ...checkedList1, (res?.data?.id??0).toString()]
            //     // checkedList1 = checkedList1.filter((v, i, a) => a.indexOf(v) === i);
            //     // dispatch(commonOnCheck(mMedia.name, plainOptions, checkedList1))
            // }
            // options.onSuccess()
        }
        const uploadProps = {
            // listType,
            name: 'file',
            // onChange: onChange,
            customRequest,
            showUploadList: {showPreviewIcon: false, showRemoveIcon: false},
        }
        return <Upload {...uploadProps} {...props}>{children}</Upload>
    }

    return (
        <section className={`flex items-center space-x-3 `}>
            <Popover content={content} title={`Fields (${resource.fields.length})`}>
                <div>
                    <p className={`w-36 truncate`}>{resource.name}</p>

                </div>
            </Popover>
            <Tooltip title={percent}>
                <div
                    ref={MoveButton}
                    onClick={(e) => {
                        let amounts1 = JSON.parse(JSON.stringify(amounts))
                        amounts1[resource.id] = percent
                        dispatch(setDataset({amounts: amounts1}))
                        dispatch(setDataset({countChangeRally: countChangeRally + 1}))
                    }}
                    onMouseMove={(e) => setPercent(widthToPercent(e))}
                    onMouseLeave={(e) => setPercent(null)}
                    className="relative cursor-pointer "
                >
                    {percent !== null &&
                    <span style={{left: offsetX}} className="mt-px absolute absolute-y h-2 w-1 bg-black-70 z-10"></span>
                    }
                    <Progress percent={amount}
                              className={`w-48`}
                              showInfo={false}
                              trailColor={`#ddd`}/>
                    <Amount value={amount}/>
                </div>
            </Tooltip>
            <Space>
                <Button icon={<DownloadOutlined/>} type="dashed"
                        onClick={() => {
                            let url = `${process.env.REACT_APP_URL}/api/rally_backup/export?`
                            url = url + objToUrlParams({resource_id: resource.id, dataset_id: eDataset?.dataset?.id})//
                            // console.log('url', url)
                            // window.open(url, '_blank')
                            window.location.assign(url)
                        }}/>
                <UploadFile accept=".csv">
                    <Button type="dashed" danger icon={<UploadOutlined/>}
                            loading={uMedia.isLoading}/>
                </UploadFile>
            </Space>
        </section>
    )

}

export const ChildAmountData = ({resource}) => (
    <section className={`flex`}>
        <Tooltip title={resource.name}>
            <p className="truncate text-gray-400 w-40 mr-2">{resource.name}</p>
        </Tooltip>
    </section>
)
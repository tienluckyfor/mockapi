import {Upload as UploadAnt} from 'antd';
import {useState, useEffect} from "react"
import {useDispatch, useSelector} from "react-redux";
import {rallydatasSelector} from "slices/rallydatas";
import {resfulClient} from "services"
import {myMediaList, mediaSelector,} from "slices/media";
import {commonOnCheck, commonsSelector} from "slices/commons";

const UploadMedia = ({listType, children, plainOptions}) => {
    const dispatch = useDispatch()
    const [fileObj, setFileObj] = useState({})
    const {dataset_id_RD,} = useSelector(rallydatasSelector)
    const {fileList, mMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)
    const [fileList1, setFileList1] = useState([])

    useEffect(() => {
        const fileCount = Object.entries(fileObj).length
        const fileDone = Object.entries(fileObj).filter(([key, item], i) => item === 1).length
        if (fileCount === fileDone && fileDone !== 0) {
            dispatch(myMediaList(dataset_id_RD))
            setFileList1([])
        }
    }, [fileObj])

    const onChange = (info) => {
        const {file} = info
        if (file?.status === 'uploading') {
            setFileObj({...fileObj, [file.uid]: 0})
            setFileList1([...fileList1, {uid: file.uid, status: file.status}])
        }
        if (file?.status === 'done') {
            setFileObj({...fileObj, [file.uid]: 1})
            let fileList2 = []
            fileList1.forEach(function (item, key) {
                if (item.uid === file.uid) {
                    fileList2.push(file)
                } else {
                    fileList2.push(item)
                }
            })
            setFileList1(fileList2)
        }
    }
    var checkedList1 = []
    useEffect(() => {
        checkedList1 = []
    }, [checkedList])

    const customRequest = async (options) => {
        const formData = new FormData()
        formData.append('file', options.file)
        formData.append('dataset_id', dataset_id_RD)
        formData.append('source', 'ant-upload')
        formData.append('uid', options.file.uid)
        const res = await resfulClient.post('/api/media', formData)
        if (res?.data?.id) {
            const list = checkedList[mMedia?.name] ?? []
            checkedList1 = [...list, ...checkedList1, (res?.data?.id??0).toString()]
            checkedList1 = checkedList1.filter((v, i, a) => a.indexOf(v) === i);
            dispatch(commonOnCheck(mMedia.name, plainOptions, checkedList1))
        }
        options.onSuccess()
    }

    const uploadProps = {
        accept: `*`,
        multiple: true,
        listType,
        name: 'file',
        onChange: onChange,
        customRequest,
        showUploadList: {showPreviewIcon: false, showRemoveIcon: false},
    }

    return (
        <>
            <UploadAnt {...uploadProps} fileList={fileList1}>
                {children}
            </UploadAnt>
            {/*<pre className="text-sm">
                {JSON.stringify(fileList, null, '  ')}
            </pre>*/}
        </>
    )
}

export default UploadMedia
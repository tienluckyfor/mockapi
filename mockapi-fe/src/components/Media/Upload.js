import {Upload as UploadAnt} from 'antd';
import {PlusOutlined} from '@ant-design/icons';
import {useState, useEffect} from "react"
import {useDispatch, useSelector} from "react-redux";
import {rallydatasSelector} from "slices/rallydatas";
import {resfulClient} from "services"
import {myMediaList, mediaSelector, } from "slices/media";
import {commonOnChange, commonsSelector} from "../../slices/commons";

const Upload = () => {
    const dispatch = useDispatch()
    const [fileObj, setFileObj] = useState({})
    const {dataset_id_RD,} = useSelector(rallydatasSelector)
    const {fileList, mMedia} = useSelector(mediaSelector)
    const {checkedList, } = useSelector(commonsSelector)
    const [fileList1, setFileList1] = useState([])

    useEffect(() => {
        const fileCount = Object.entries(fileObj).length
        const fileDone = Object.entries(fileObj).filter(([key, item], i) => item === 1).length
        if (fileCount === fileDone) {
            dispatch(myMediaList(dataset_id_RD))
            setFileList1([])
        }
    }, [fileObj])

    const onChange = (info) => {
        console.log('info', info)
        const {file} = info
        console.log('file', file)
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

    const customRequest = async (options) => {
        const formData = new FormData()
        formData.append('file', options.file)
        formData.append('dataset_id', dataset_id_RD)
        formData.append('source', 'ant-upload')
        formData.append('uid', options.file.uid)
        const res = await resfulClient.post('/api/media', formData)
        const list = checkedList[mMedia?.name] ?? []
        console.log('list', list)
        dispatch(commonOnChange(mMedia.name, [...list, res?.data?.id.toString()]))

        // let checkedList1 = checkedList[mMedia.name]
        // console.log('checkedList[mMedia.name]', checkedList[mMedia.name])
        // console.log('res', res?.data?.id)
        // const file = {
        //     ...res.data,
        //     name: res.data.name_upload,
        //     status: 'done',
        //     url: `${process.env.REACT_APP_STORAGE_URL}/${res.data.image}`,
        //     thumbUrl: `${process.env.REACT_APP_STORAGE_URL}/${res.data.thumb_image}`,
        // }
        options.onSuccess()
    }

    const uploadProps = {
        accept: `image/*, video/*`,
        multiple: true,
        listType: "picture-card",
        name: 'file',
        onChange: onChange,
        customRequest,
        showUploadList: {showPreviewIcon: false, showRemoveIcon: false},
    }

    return (
        <>
            <UploadAnt {...uploadProps} fileList={fileList1}>
                <div>
                    <PlusOutlined/>
                    <div style={{marginTop: 8}}>Upload</div>
                </div>
            </UploadAnt>
            {/*<pre className="text-sm">
                {JSON.stringify(fileList, null, '  ')}
            </pre>*/}
        </>
    )
}

export default Upload
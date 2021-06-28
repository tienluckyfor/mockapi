import {Upload as UploadAnt} from 'antd';
import {PlusOutlined} from '@ant-design/icons';
import Cookies from "universal-cookie";
import {useState, useEffect} from "react"
import {useSelector} from "react-redux";
import {rallydatasSelector} from "slices/rallydatas";

const Upload = () => {
    const cookies = new Cookies()
    const [uid, setUid] = useState()
    const [fileObj, setFileObj] = useState({})
    const {dataset_id_RD,} = useSelector(rallydatasSelector)

    useEffect(() => {
        const fileCount = Object.entries(fileObj).length
        const fileDone = Object.entries(fileObj).filter(([key, item], i) => item === 1).length
        console.log('fileCount === fileDone', fileCount, fileDone)
        if (fileCount === fileDone) {

        }
    }, [fileObj])

    const uploadProps = {
        accept: `image/*, video/*`,
        multiple: true,
        showUploadList: {showPreviewIcon: false},
        listType: "picture-card",
        name: 'file',
        action: `${process.env.REACT_APP_API_URL}/media`,
        headers: {
            authorization: `Bearer ${cookies.get('mockapi-token') ?? ``}`,
            "dataset-id": dataset_id_RD,
            "source": `ant-upload`,
            "uid": uid,
        },
        beforeUpload: (file) => {
            setUid(file.uid)
        },
        onChange(info) {
            const {file} = info
            if (file?.status === 'uploading') {
                setFileObj({...fileObj, [file.uid]: 0})
            }
            if (file?.status === 'done') {
                setFileObj({...fileObj, [file.uid]: 1})
            }
        },
    }

    return (<UploadAnt {...uploadProps} >
        <div>
            <PlusOutlined/>
            <div style={{marginTop: 8}}>Upload</div>
        </div>
    </UploadAnt>)
}

export default Upload
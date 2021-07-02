import {Modal, Input, Space, Image, Radio, Checkbox, Select, Button, List, Spin, Alert, Tooltip} from 'antd';
import {BorderInnerOutlined, UnorderedListOutlined, DeleteOutlined, EyeOutlined, PlusOutlined, UploadOutlined}
    from '@ant-design/icons';
import {useDispatch, useSelector} from "react-redux";
import {authsSelector,} from "slices/auths";
import {rallydatasSelector} from "slices/rallydatas";
import {askDeleteMedia, deleteMedia, mediaSelector, myMediaList, setMediaMerge} from "slices/media";
import {commonsSelector, commonOnCheck, commonOnCheckAll, setCommon, setCommonMerge} from "slices/commons";
import {useEffect, useState} from "react"
import moment from "moment"

import Upload from "./Upload";

const {Search} = Input;
const {Option} = Select;
const CheckboxGroup = Checkbox.Group;

export const MediaModal = () => {
    const dispatch = useDispatch()

    const {me} = useSelector(authsSelector)
    const {dataset_id_RD,} = useSelector(rallydatasSelector)
    const {mlMedia, mMedia, adMedium} = useSelector(mediaSelector)
    const {checkedList, indeterminate, checkAll,} = useSelector(commonsSelector)
    const [dataset_id, setDataset_id] = useState(dataset_id_RD)
    // const [dataset_id, setDataset_id] = useState(1)
    const [viewMode, setViewMode] = useState('list')
    const [plainOptions, setPlainOptions] = useState([])

    useEffect(() => {
        // if (!mMedia.visible || dataset_id === null) return;
        // console.log('dataset_id', dataset_id)
        dispatch(myMediaList(dataset_id))
    }, [dataset_id, mMedia])

    // useEffect(() => {
    //     if (mMedia.visible && dataset_id_RD != dataset_id)
    //         setDataset_id(dataset_id_RD)
    // }, [mMedia])
    useEffect(() => {
        if(mlMedia.isRefresh) {
            dispatch(setCommonMerge('checkedList', {[mMedia?.name]: []}))
            dispatch(myMediaList(dataset_id))
        }
        const plainOptions = (mlMedia.data ?? []).map((medium) => medium.id)
        setPlainOptions(plainOptions)
        // dispatch(setCommon({plainOptions}))
    }, [mlMedia])

    const gridView = () => {
        return (
            <Image.PreviewGroup>
                <Space size={[10, 10]} wrap>
                    <Upload listType="picture-card" plainOptions={plainOptions}>
                        <div style={{marginTop: 8}}>Upload</div>
                    </Upload>
                    {(mlMedia.data ?? []).map((medium, key) =>
                        <div className={`relative border border-gray-300 p-1`} style={{width: 104, height: 104}}>
                            <Checkbox
                                value={medium.id}
                                className={`absolute z-10 left-0 top-0 ml-2 mt-2 px-1 bg-white rounded`}/>
                            {medium.file_type === `image` &&
                            <Image
                                preview={{src: medium.image, mask: <EyeOutlined/>}}
                                height={90}
                                width={90}
                                style={{objectFit: "cover"}}
                                src={medium.thumb_image}
                            />
                            }
                        </div>
                    )}
                </Space>
            </Image.PreviewGroup>
        )
    }

    const listView = () => {
        return (
            <Image.PreviewGroup>
                <Upload plainOptions={plainOptions}>
                    <Button icon={<UploadOutlined/>}>Upload Media</Button>
                </Upload>
                <List
                    dataSource={(mlMedia.data ?? [])}
                    renderItem={medium => (
                        <List.Item>
                            <section className={`space-x-3 flex `}>
                                <div className={`relative`}>
                                    <Checkbox
                                        value={medium.id}
                                        className={`absolute z-10 left-0 top-0 ml-1 mt-1 m-0 px-1 bg-white rounded`}/>
                                    {medium.file_type === `image` &&
                                    <Image
                                        preview={{src: medium.image, mask: <EyeOutlined/>}}
                                        height={60}
                                        width={60}
                                        style={{objectFit: "cover"}}
                                        src={medium.thumb_image}
                                    />
                                    }
                                </div>
                                <div className="w-96">
                                    <p className="truncate-2y ">{medium.name_upload}</p>
                                    <p className="text-gray-400 ">{moment(medium.updated_at).fromNow()}</p>
                                </div>
                            </section>
                        </List.Item>
                    )}
                />
            </Image.PreviewGroup>)
    }

    const renderHeader = () => {
        return (<section className={`flex items-center justify-between space-x-3 `}>
            <Space size={`middle`}>
                {checkedList[mMedia.name] && checkedList[mMedia.name]?.length !== 0 &&
                <span className="">{checkedList[mMedia.name]?.length} selected</span>
                }
                <Checkbox
                    indeterminate={indeterminate}
                    onChange={(e) => dispatch(commonOnCheckAll(mMedia.name, plainOptions, e))}
                    checked={checkAll}
                    className={`font-bold`}
                >
                    Check all
                </Checkbox>
                {checkedList[mMedia.name] && checkedList[mMedia.name]?.length !== 0 &&
                <Button type="dashed" danger icon={<DeleteOutlined/>}
                        loading={adMedium.isLoading}
                        onClick={() => dispatch(askDeleteMedia(checkedList[mMedia.name]))}
                />
                }
            </Space>
            <Space>
                <Search placeholder="input search text" style={{width: 200}}/>
                <Radio.Group
                    value={viewMode}
                    optionType="button"
                    onChange={(e) => setViewMode(e.target.value)}
                >
                    <Radio.Button value="grid">
                        <BorderInnerOutlined/>
                    </Radio.Button>
                    <Radio.Button value="list">
                        <UnorderedListOutlined/>
                    </Radio.Button>
                </Radio.Group>
            </Space>
        </section>)
    }

    const renderAlert = () => {
        return (<Alert
            message="Force delete"
            description={
                <>
                    <p className="text-red-600">This action also delete media from these data below</p>
                    <List
                        dataSource={adMedium.rallies}
                        renderItem={item => (
                            <List.Item>
                                <Tooltip title={JSON.stringify(item)}>
                                    <p className="truncate w-72">
                                        {JSON.stringify(item)}
                                    </p>
                                </Tooltip>
                            </List.Item>
                        )}
                    />
                </>
            }
            type="error"
            action={
                <Space direction="vertical">
                    <Button size="small" type="primary" onClick={() => dispatch(deleteMedia(checkedList[mMedia.name]))}>
                        Accept
                    </Button>
                    <Button size="small" danger type="ghost">
                        Decline
                    </Button>
                </Space>
            }
            // closable
        />)
    }
    return (<Modal
        title={<Space>
            <h2>Media</h2>
            <Select
                // showSearch
                size={`small`}
                style={{width: 150}}
                placeholder="Select a dataset"
                value={dataset_id.toString()}
                onChange={(id) => setDataset_id(id)}
            >
                {[{id: '0', name: "ALL"}, ...(me?.data?.datasets ?? [])].map((dataset) => (
                    <Option key={dataset.id} value={dataset.id}>{dataset.name}</Option>
                ))}
            </Select>
        </Space>}
        visible={mMedia.visible}
        cancelButtonProps={{style: {display: 'none'}}}
        onOk={(e) => dispatch(setMediaMerge('mMedia', {visible: !mMedia.visible}))}
        onCancel={(e) => dispatch(setMediaMerge('mMedia', {visible: !mMedia.visible}))}
        width={1000}
    >
        <div className="space-y-3 ">
            {renderHeader()}
            {(adMedium.rallies ?? []).length !== 0 && renderAlert()}

            <div className="h-96 overflow-y-auto ">
                {mlMedia?.isLoading && <Spin/>}
                <div className="">
                    <CheckboxGroup
                        value={checkedList[mMedia.name]}
                        onChange={(list) =>
                            dispatch(commonOnCheck(mMedia.name, plainOptions, list))}
                    >
                        {viewMode === 'grid' && gridView()}
                        {viewMode === 'list' && listView()}
                    </CheckboxGroup>
                </div>
            </div>
        </div>
    </Modal>)
}

export default MediaModal
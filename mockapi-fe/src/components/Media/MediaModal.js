import {Modal, Input, Space, Image, Radio, Checkbox, Select, Button, List,} from 'antd';
import {BorderInnerOutlined, UnorderedListOutlined, DeleteOutlined,} from '@ant-design/icons';
import {useDispatch, useSelector} from "react-redux";
import {authsSelector,} from "slices/auths";
import {rallydatasSelector} from "slices/rallydatas";
import {mediaSelector, myMediaList, setMediaMerge} from "slices/media";
import {commonsSelector, onChange, onCheckAllChange, setCommon} from "slices/commons";
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
    const {mlMedia, mMedia} = useSelector(mediaSelector)
    const {checkedList, indeterminate, checkAll, plainOptions} = useSelector(commonsSelector)
    const [dataset_id, setDataset_id] = useState(dataset_id_RD)
    const [viewMode, setViewMode] = useState('grid')

    useEffect(() => {
        if (!mMedia.visible || dataset_id === null) return;
        dispatch(myMediaList(dataset_id))
    }, [dataset_id, mMedia])

    useEffect(() => {
        if (mMedia.visible && dataset_id_RD != dataset_id)
            setDataset_id(dataset_id_RD)
    }, [mMedia])

    useEffect(() => {
        const plainOptions = (mlMedia.data ?? []).map((medium) => medium.id)
        dispatch(setCommon({plainOptions}))
    }, [mlMedia])

    const gridView = () => {
        if (viewMode !== 'grid') return;
        return (
            <>
                <Space size={[10, 10]} wrap>
                    <Upload/>
                    {(mlMedia.data ?? []).map((medium, key) =>
                        <div className={`relative border border-gray-300 p-1`} style={{width: 104, height: 104}}>
                            <Checkbox
                                value={medium.id}
                                className={`absolute z-10 left-0 top-0 ml-1 mt-1 m-0 px-1 bg-white rounded`}/>
                            {medium.file_type === `image` &&
                            <Image
                                preview={false}
                                height={90}
                                width={90}
                                style={{objectFit: "cover"}}
                                src={medium.thumb_image}
                            />
                            }
                        </div>
                    )}
                </Space>
            </>
        )
    }
    const listView = () => {
        if (viewMode !== 'list') return;
        return (<List
            dataSource={(mlMedia.data ?? [])}
            renderItem={medium => (
                <List.Item>
                    <section className={`space-x-3 flex `}>
                        <div className={`relative`}>
                            <Checkbox
                                value={medium.id}
                                className={`absolute z-10 left-0 top-0 -ml-2 -mt-2 m-0 px-1 bg-white rounded`}/>
                            {medium.file_type === `image` &&
                            <Image
                                preview={false}
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
        />)
    }

    return (<Modal
        title={<Space>
            <h2>Media</h2>
            <Select
                showSearch
                size={`small`}
                style={{width: 150}}
                placeholder="Select a dataset"
                value={dataset_id}
                onChange={(id) => setDataset_id(id)}
            >
                {[{id: 0, name: "ALL"}, ...(me?.data?.datasets ?? [])].map((dataset) => (
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
        <div className={`flex items-center justify-between space-x-3 `}>
            <Space size={`middle`}>
                {checkedList[mMedia.name] && checkedList[mMedia.name]?.length !== 0 &&
                <span className="">{checkedList[mMedia.name]?.length} selected</span>
                }
                <Checkbox
                    indeterminate={indeterminate}
                    onChange={(e) => dispatch(onCheckAllChange(e))}
                    checked={checkAll}
                    className={`font-bold`}
                >
                    Check all
                </Checkbox>
                {checkedList[mMedia.name] && checkedList[mMedia.name]?.length !== 0 &&
                <Button type="dashed" danger icon={<DeleteOutlined/>}/>
                }
            </Space>
            <Space>
                <Search placeholder="input search text" style={{width: 200}}/>
                <Radio.Group
                    value={viewMode}
                    optionType="button"
                    onChange={(e) => setViewMode(e.target.value)}
                >
                    <Radio.Button value="grid"><BorderInnerOutlined/></Radio.Button>
                    <Radio.Button value="list"><UnorderedListOutlined/></Radio.Button>
                </Radio.Group>
            </Space>
        </div>
        <div className="h-96 overflow-y-auto mt-4">
            <div className="pl-6">
                <CheckboxGroup
                    value={checkedList[mMedia.name]}
                    onChange={(list) => dispatch(onChange(mMedia.name, list))}
                >
                    {gridView()}
                    {listView()}
                </CheckboxGroup>
            </div>
        </div>

    </Modal>)
}

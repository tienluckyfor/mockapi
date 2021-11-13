import React from 'react'
import {Button, Checkbox, Dropdown, Image, Menu, Popconfirm, Space, Tooltip} from "antd";
import {EyeOutlined, PushpinOutlined, EyeInvisibleOutlined} from '@ant-design/icons';
import {commonsSelector, handleMenuClick, handleVisibleChange, setCommonMerge} from "slices/commons";
import {
    deleteRallydata,
    duplicateRallydata,
    rallydatasSelector,
    setRallydataMerge,
    sortRallydata
} from "slices/rallydatas";
import {getItype} from "./configRallydata";
import {useDispatch, useSelector} from "react-redux";
import {getFirstThumb, objToString} from "services";
import DragSortingTable from "components/DragSortingTable";

const RenderTableRallydataSort = ({mlDRRallydata, fieldsRallydata, typeShow = null, resourceName}) => {
    const dispatch = useDispatch()
    const {visibles, checkedList} = useSelector(commonsSelector)
    const {sRallydata} = useSelector(rallydatasSelector)

    const menu = (rallydata) => {
        return (<Menu onClick={(e) => dispatch(handleMenuClick(e, rallydata))}>
            <Menu.Item>
                <Button
                    block
                    className="text-left"
                    size={`small`}
                    type="link"
                    onClick={(e) => dispatch(duplicateRallydata({id: rallydata.originalId}))}
                >
                    Duplicate
                </Button>
            </Menu.Item>
            <Menu.Item>
                <Button
                    block
                    className="text-left"
                    size={`small`}
                    type="link"
                    onClick={(e) => {
                        dispatch(setRallydataMerge('eRallydata', {isOpen: true, rallydata, firstCount: 0}))
                    }}
                >
                    Edit
                </Button>
            </Menu.Item>
            <Menu.Item key={`delete`}>
                <Popconfirm
                    title={`Delete Rallydata: ${rallydata.id}`}
                    onConfirm={(e) => dispatch(deleteRallydata({id: rallydata.originalId}))}
                    okText="Yes"
                    cancelText="No"
                    okButtonProps={{autoFocus: true}}
                >
                    <Button
                        block
                        className="text-left"
                        size={`small`}
                        type={`link`}
                        danger
                    >
                        Delete
                    </Button>
                </Popconfirm>
            </Menu.Item>
        </Menu>)
    };

    let columns = [];
    let childFields = {};
    (fieldsRallydata ?? []).forEach((field) => {
        // (fieldsRallydata ?? []).map((field) => {
        const iType = getItype(field.type, field.fakerjs)
        if (iType === 'Object ID') {
            columns.push({
                title: <Tooltip title={field.name}>
                    <span className={`capitalize`}>{field.name}</span>
                </Tooltip>,
                width: 70,
                dataIndex: field.name,
                fixed: 'left',
                render: (text, rallydata, index) => {
                    const val = rallydata[field.name]
                    if (typeShow === 'checked') {
                        return <Space>
                            <Checkbox
                                onChange={() => {
                                    const checkedList1 = checkedList[resourceName].filter((item) => item != rallydata.id)
                                    dispatch(setCommonMerge('checkedList', {[resourceName]: checkedList1}))
                                }}
                                value={val}
                                checked={true}
                            >{val}</Checkbox>
                        </Space>
                    }
                    if (typeShow === 'checkbox') {
                        return <Tooltip title={val}>
                            <Checkbox value={val} className="truncate">
                                <span className="-ml-1">{val}</span>
                            </Checkbox>
                        </Tooltip>
                    }
                    return <>
                        <div className="relative">
                            <Space size="3" direction="vertical" className="absolute z-10 -mt-3 -ml-4 ">
                                {rallydata._is_pin &&
                                <PushpinOutlined rotate={-90} className="text-indigo-500 text-xs"/>
                                }
                                {!rallydata._is_show &&
                                <EyeInvisibleOutlined className="text-gray-300 text-xs"/>
                                }
                            </Space>
                        </div>
                        <Dropdown
                            overlay={menu(rallydata)}
                            arrow
                            visible={visibles[rallydata.originalId]}
                            onVisibleChange={(flag) => dispatch(handleVisibleChange(flag, rallydata))}
                        >

                            <Button
                                type={`dashed`}
                                size={`small`}
                                danger
                                className={`px-1`}
                            >{val}</Button>
                        </Dropdown>
                    </>
                }
            })
            return;
        }
        columns.push({
            title: <Tooltip title={field.name}>
                <p className={`capitalize truncate`}>{field.name}</p>
            </Tooltip>,
            width: iType === `Boolean` ? 70 : 150,
            dataIndex: field.name,
            render: (text, rallydata, index) => {
                const val = rallydata[field.name]
                if (iType === 'Boolean') {
                    const val1 = val ? 'true' : 'false'
                    return <Tooltip title={val1}>
                        <p className={val ? `text-indigo-700` : `text-red-700`}>{val1}</p>
                    </Tooltip>
                }
                if (!val || val && !(val ?? 0).toString().length)
                    // if ((val ?? 0).toString().length)
                    return <Tooltip title={val}>
                        <p className={`text-gray-500`}>-</p>
                    </Tooltip>
                if (iType === 'Object ID')
                    return <Dropdown overlay={menu(rallydata)} arrow>
                        <Button
                            type={`dashed`}
                            size={`small`}
                            danger
                            className={`px-1`}
                        >
                            <span>{val}</span>
                        </Button>
                    </Dropdown>
                if (iType === 'Date')
                    return <Tooltip title={val}>
                        <p className={`text-gray-500 truncate-2y`}>{val}</p>
                    </Tooltip>
                if (iType === 'Media') {
                    return <Image.PreviewGroup>
                        <Space size={[4, 4]} align="start" wrap>
                            {(val.media ?? []).map((medium, key) => {
                                    if (medium.file_type === 'image')
                                        return <Image
                                            key={key}
                                            preview={{src: getFirstThumb(medium), mask: <EyeOutlined/>}}
                                            height={30}
                                            width={30}
                                            style={{objectFit: "cover"}}
                                            // src={medium.thumb_image}
                                            src={getFirstThumb(medium)}
                                        />
                                    return <a key={key} target="_blank" rel="noreferrer" href={medium.file}>
                                        <Image
                                            preview={false}
                                            height={30}
                                            width={30}
                                            style={{objectFit: "cover"}}
                                            // src={medium.thumb_image}
                                            src={getFirstThumb(medium)}
                                        />
                                    </a>
                                }
                            )}
                        </Space>
                    </Image.PreviewGroup>
                }
                if (iType === 'Object' || iType === 'Array') {
                    return <Tooltip title={objToString(val)}>
                        <p className="text-sm truncate-2y">
                            {objToString(val, true)}
                        </p>
                    </Tooltip>
                }
                if (iType === 'Resource') {
                    childFields[field.name] = field.name;
                    return <Tooltip title={objToString(val)}>
                        <p className="text-sm truncate-2y">
                            <b className="mr-1 text-red-500">{(val ?? []).length}</b>
                            {objToString(val, true)}
                        </p>
                    </Tooltip>
                }
                return <Tooltip title={val}>
                    <p className={`truncate-2y`}>{val.toString()}</p>
                </Tooltip>
            }
        })
    })
    const data = (mlDRRallydata?.data ?? []).map((rallydata) => {
        return {
            ...rallydata.data,
            originalId: rallydata.id,
            _is_show: rallydata.is_show,
            _is_pin: rallydata.is_pin
        }
    })

    return (
        <div style={{width: (typeShow === 'checked' ? 700 : 738)}} className={`mt-4`}>
            <DragSortingTable
                columns={columns}
                dataSource={data}
                onChange={(ids) => dispatch(sortRallydata(ids))}
                isLoading={sRallydata.isLoading}
            />
        </div>
    )
}

export default React.memo(RenderTableRallydataSort)
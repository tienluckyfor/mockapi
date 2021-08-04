import {Button, Form, Input, Modal, Table} from 'antd'
import React, {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux"
import {
    findRallydata,
    rallydatasSelector,
    setRallydata,
    replaceRallydata,
    setFieldsRallydata, setRallydataMerge, detailRallydata, editRallydata
} from "slices/rallydatas";
import debounce from "lodash/debounce"
import EditRallydataForm from "./EditRallydataForm";

const FindReplaceRallydata = ({visible, onCreate, onCancel}) => {
    const dispatch = useDispatch()
    const {fRallydata, rRallydata, deRallydata, eRallydata, fieldsRallydata,
        resource_id_RD} = useSelector(rallydatasSelector)
    const [form] = Form.useForm()

    // edit
    useEffect(() => {
        dispatch(setFieldsRallydata())
    }, [deRallydata])
    useEffect(() => {
        dispatch(detailRallydata(fRallydata?.dataset.id))
        dispatch(setRallydata({
            dataset_id_RD: fRallydata?.dataset.id,
        }))
    }, [])
    // end-edit

    const debounceFetch = debounce(name => {
        dispatch(findRallydata(fRallydata?.dataset.id, name))
    }, 500);

    useEffect(() => {
        dispatch(findRallydata(fRallydata?.dataset.id, ''))
    }, [])

    useEffect(() => {
        if (fRallydata.isRefresh)
            dispatch(findRallydata(fRallydata?.dataset.id, fRallydata.find))
    }, [fRallydata])

    const RenderTableSelect = () => {
        const [selectedRowKeys, setSelectedRowKeys] = useState([])
        const [hasSelected, setHasSelected] = useState(false)
        const [replace, setReplace] = useState(rRallydata.replace)

        useEffect(() => {
            setSelectedRowKeys((fRallydata.data ?? []).map((item) => item.id))
        }, [fRallydata])

        useEffect(() => {
            setHasSelected(selectedRowKeys.length ? true : false)
        }, [selectedRowKeys])

        const columns = [
            {
                title: 'id',
                dataIndex: 'id',
                render: (text, rally, index) => {
                    return <Button
                        onClick={(e) =>{
                            dispatch(setRallydataMerge('eRallydata',
                                {isOpen: true, rallydata: {...rally.data, originalId:rally.id}}))
                            dispatch(setRallydata({resource_id_RD: rally?.resource?.id}))
                        }}
                        type="dashed" className="bg-transparent">{text}</Button>
                }
            },
            {
                title: 'data',
                dataIndex: 'data',
                render: (text, rally, index) => {
                    let data = JSON.stringify(rally.data)
                    if (fRallydata?.find && fRallydata.find.length != 0) {
                        let re = new RegExp(fRallydata.find, "g");
                        data = data.replace(re, `<mark class="bg-yellow-300">${fRallydata.find}</mark>`)
                    }
                    return <p dangerouslySetInnerHTML={{__html: data}}/>
                }
            },
        ];

        return <div className="space-y-3 pt-3">
            <section className="inline space-x-3">
                <Input className="w-56"
                       placeholder={`Replace ${fRallydata?.dataset.name}`}
                       onChange={(e) => setReplace(e.target.value)}
                />
                <Button
                    type="primary"
                    onClick={() => dispatch(replaceRallydata(selectedRowKeys, fRallydata.find, replace))}
                    loading={rRallydata.isLoading}
                >
                    Replace
                </Button>
                <span>
                    {hasSelected ? `Selected ${selectedRowKeys.length} items` : ''}
                </span>
            </section>
            <Table
                rowSelection={{
                    selectedRowKeys,
                    onChange(selectedRowKeys) {
                        setSelectedRowKeys(selectedRowKeys)
                    }
                }}
                dataSource={(fRallydata?.data ?? []).map(item => {
                    return {...item, key: item.id}
                })}
                columns={columns}
                pagination={{pageSize: 20, hideOnSinglePage: true}}
            />
        </div>
    }

    return (
        <>
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
            <Modal
                visible={visible}
                title="Find & replace"
                okText="Save"
                cancelText="Close"
                onCancel={onCancel}
                onOk={() => {
                    form
                        .validateFields()
                        .then((values) => {
                            form.resetFields()
                            onCreate(values)
                        })
                        .catch((info) => {
                            console.log('Validate Failed:', info);
                        });
                }}
                width={570}
                confirmLoading={fRallydata.isLoading}
                okButtonProps={{style: {display: 'none'}}}
            >
                <Input.Search
                    placeholder={`Search ${fRallydata?.dataset.name}`}
                    onSearch={(value) => debounceFetch(value)}
                    onChange={(e) => debounceFetch(e.target.value)}
                    enterButton
                />
                <RenderTableSelect/>
            </Modal>
        </>
    );
}

export default FindReplaceRallydata
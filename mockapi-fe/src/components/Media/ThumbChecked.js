import React, {useEffect} from 'react';
import {Button, Checkbox, Image, Space} from "antd";
import {mediaSelector, setMediaMerge, uploadMediaPaste,} from "slices/media";
import {commonsSelector, setCommonMerge} from "slices/commons";
import {useDispatch, useSelector} from "react-redux";
import {getFirstThumb} from "services";

export const ThumbChecked = ({name}) => {
    const dispatch = useDispatch()
    const {mMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)
    const {pMedia,} = useSelector(mediaSelector)

    useEffect(() => {
        function onMediaUpload(e) {
            console.log('FormRallydata onMediaUpload')
            let files = [];
            for (let item of e.clipboardData.items) {
                if (item.kind === 'file')
                    files.push(item.getAsFile())
            }
            console.log('4')
            dispatch(setMediaMerge('pMedia', {files}))
            // dispatch(uploadMediaPaste(mMedia.name))
        }

        // window.addEventListener('paste', (e) => {
        //     let files = [];
        //     for (let item of e.clipboardData.items) {
        //         if (item.kind === 'file') {
        //             files.push(item.getAsFile())
        //         }
        //     }
        //     dispatch(setMediaMerge('pMedia', {files}))
        // })

        window.addEventListener('paste', onMediaUpload)
        return () => {
            window.removeEventListener('paste', onMediaUpload)
        }
    }, [dispatch])

    useEffect(() => {
        if (!mMedia.visible && pMedia.files.length)
            dispatch(setMediaMerge('pMedia', {files: []}))
    }, [mMedia])

    return <section className="flex flex-col space-y-3">
        <Space>
            <Button
                className="w-36"
                onClick={() => dispatch(setMediaMerge('mMedia', {
                    visible: !mMedia?.visible,
                    name
                }))}
            >Choose media</Button>
            {pMedia.files.length != 0 &&
            <Button
                type="dashed"
                onClick={(e) => dispatch(uploadMediaPaste(name))}
                loading={pMedia.isLoading}
            >Paste</Button>
            }
        </Space>

        {cbMedia[name]?.length !== 0 &&
        <div>
            <Space size={[10, 10]} wrap>
                {(cbMedia[name] ?? []).map((medium, key) => (
                    <div className={`relative border border-gray-300 p-1`}
                         style={{width: 104, height: 104}}>
                        <Checkbox
                            onChange={() => {
                                const checkedList1 = checkedList[name].filter((item) => item != medium.id)
                                dispatch(setCommonMerge('checkedList', {[name]: checkedList1}))
                            }}
                            value={medium.id}
                            checked
                            className={`absolute z-10 left-0 top-0 ml-1 mt-1 m-0 px-1 bg-white rounded`}/>
                        <Image
                            preview={false}
                            height={90}
                            width={90}
                            style={{objectFit: "cover"}}
                            src={getFirstThumb(medium)}
                        />
                    </div>
                ))}
            </Space>
        </div>
        }
    </section>
}


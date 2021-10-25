import React, {useEffect, useMemo, useState} from "react";
import {Button, } from 'antd';
import ReactQuill from "react-quill";
import Quill from "quill";
import ResizeModule from "@ssumo/quill-resize-module";
import QuillImageDropAndPaste from "quill-image-drop-and-paste";
import "react-quill/dist/quill.snow.css";
import {mediaSelector, setMediaMerge} from "slices/media";
import {useDispatch, useSelector} from "react-redux";
import {commonsSelector, setCommonMerge} from "slices/commons";

Quill.register("modules/resize", ResizeModule);
Quill.register('modules/imageDropAndPaste', QuillImageDropAndPaste)

export const ReactQuillCustom = (props) => {
    const {onChange, value, name} = props
    const dispatch = useDispatch()
    const {mMedia, mlMedia, cbMedia} = useSelector(mediaSelector)
    const {checkedList,} = useSelector(commonsSelector)

    const modules = useMemo(() => {
        return {
            resize: {
                locale: {
                    altTip: "按住alt键比例缩放",
                    floatLeft: "left",
                    floatRight: "right",
                    center: "center",
                    restore: "res.."
                }
            },
            toolbar: [
                [{'header': [1, 2, 3, false]}],
                ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                [{'list': 'ordered'}, {'list': 'bullet'}, {'indent': '-1'}, {'indent': '+1'}],
                ['link', 'video'], // image
                [{'align': []}, {'color': []}, {'background': []}],
                ['clean']
            ],
        }
    }, [])

    let quillRef = null;
    useEffect(() => {
        const mediaR = (mlMedia.data ?? []).filter((medium) => {
            return checkedList[name]
                && (checkedList[name].indexOf(medium.id) !== -1)
        })
        dispatch(setMediaMerge('cbMedia', {[name]: mediaR}))
    }, [checkedList, mlMedia, dispatch, name])

    const [position, setPosition] = useState()
    useEffect(() => {
        const r = quillRef.getSelection()
        if (r) setPosition(r.index)
        if (!mMedia.visible && (cbMedia[name] ?? []).length !== 0) {
            (cbMedia[name] ?? []).forEach((key, medium) => {
                //(cbMedia[name] ?? []).map((medium) => {
                switch (medium.file_type) {
                    case 'image':
                        const position1 = position ?? quillRef.editor.delta.length()
                        quillRef.insertEmbed(position1, 'image', medium.file);
                        break;
                    // case 'video':
                    //     quillRef.insertEmbed(position, 'video', medium.file);
                    //     break;
                    default:
                        break;
                }
            })
            dispatch(setMediaMerge('cbMedia', {[name]: []}))
            dispatch(setCommonMerge('checkedList', {[name]: []}))
        }
    }, [mMedia, cbMedia, dispatch, name, position, quillRef])

    return (
        <>
            <ReactQuill
                ref={(c) => {
                    quillRef = (c && c.editor) || quillRef;
                }}
                modules={modules}
                onChange={onChange}
                value={value || ''}
            />
            <Button block className="-mt-px"
                    onClick={() => dispatch(setMediaMerge('mMedia', {
                        visible: !mMedia?.visible,
                        name
                    }))}
            >Choose media</Button>
        </>
    )
}


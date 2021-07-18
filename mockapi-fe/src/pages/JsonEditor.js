/*
* npm install --save jsoneditor jsoneditor-react
* */
import {JsonEditor as Editor} from 'jsoneditor-react';
import 'jsoneditor-react/es/editor.min.css';
import {useState} from "react";
import {Radio, } from 'antd';

const JsonEdit = () => {
    const handleChangeJson = (v) => {
        setJson(v)
    }
    const [json, setJson] = useState({})
    return (
        <>

            <Editor
                mode="code"
                value={json}
                onChange={(v) => handleChangeJson(v)}
                allowedModes={['tree', 'form', 'code']}
            />
        </>

    );
}

export default JsonEdit
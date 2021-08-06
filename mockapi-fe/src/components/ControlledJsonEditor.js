import React, { useEffect, useRef } from "react";
import { JsonEditor as JsonEditorWrapper } from "jsoneditor-react";
// import "jsoneditor/dist/jsoneditor.css";
import Ajv from 'ajv';

import ace from 'brace';
import 'brace/mode/json';
import 'brace/theme/github';

const ajv = new Ajv({ allErrors: true, verbose: true });

export const ControlledJsonEditor = ({ value, onChange, ...props }) => {
    const jsonEditorRef = useRef();

    useEffect(() => {
        const editor =
            jsonEditorRef &&
            jsonEditorRef.current &&
            jsonEditorRef.current.jsonEditor;
        if (editor && value) {
            editor.update(value);
        }
    }, [jsonEditorRef, value]);

    return (
        <JsonEditorWrapper
            // ajv={ajv}
            // ace={ace}
            // theme="ace/theme/github"
            htmlElementProps={{
                style: {resize:'vertical',overflow: 'hidden', height:'300px'},
            }}
            value={value}
            onChange={onChange}
            ref={jsonEditorRef}
            mode="text"
            allowedModes={['text', 'tree', 'form']}
        />
    );
};

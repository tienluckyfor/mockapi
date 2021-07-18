import React, { useEffect, useRef } from "react";
import { JsonEditor as JsonEditorWrapper } from "jsoneditor-react";

import "jsoneditor/dist/jsoneditor.css";

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
            value={value}
            onChange={onChange}
            ref={jsonEditorRef}
            {...props}
        />
    );
};

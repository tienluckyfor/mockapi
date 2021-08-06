import React, { useEffect, useRef } from "react";
import AceEditor from "react-ace";

export const ControlledAceEditor = (props) => {
    return (
        <AceEditor
            showPrintMargin={true}
            showGutter={true}
            highlightActiveLine={true}
            value={props.value}
            mode="json"
            theme="github"
            onChange={props.onChange}
            name="UNIQUE_ID_OF_DIV"
            editorProps={{ $blockScrolling: true }}
            style={{border:'solid 1px #ccc', width:'100%', resize:'vertical',overflow: 'hidden', height:'300px'}}
            /*setOptions={{
                enableBasicAutocompletion: false,
                enableLiveAutocompletion: false,
                enableSnippets: false,
                showLineNumbers: true,
                tabSize: 2,
                useWorker: false,
            }}*/
            // fullScreen={true}

        />
    );
};

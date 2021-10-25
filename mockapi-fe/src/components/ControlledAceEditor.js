import React, {useRef} from "react";
import AceEditor from "react-ace";
import {Button} from "antd";

export const ControlledAceEditor = (props) => {
    const aceEditor = useRef();
    const updateSize = () => {
        aceEditor.current.editor.resize();
        aceEditor.current.editor.renderer.updateFull();
    }
    return (
        <>
            <AceEditor
                ref={aceEditor}
                showPrintMargin={true}
                showGutter={true}
                highlightActiveLine={true}
                value={props.value}
                mode="json"
                theme="github"
                onChange={(v) => {
                    props.onChange(v);
                }}
                onSelectionChange={() => updateSize()}
                name="UNIQUE_ID_OF_DIV"
                editorProps={{$blockScrolling: true}}
                style={{
                    border: 'solid 1px #ccc',
                    width: '100%',
                    height: '300px',
                    resize: 'vertical',
                    overflow: 'hidden',
                }}
            />
            <Button block className="-mt-px"
                    onClick={() => {
                        try {
                            const val = JSON.stringify(JSON.parse(props.value), null, '\t');
                            aceEditor.current.editor.setValue(val);
                        } catch (e) {
                        }
                    }}
            >JSON beauty</Button>
        </>
    );
};

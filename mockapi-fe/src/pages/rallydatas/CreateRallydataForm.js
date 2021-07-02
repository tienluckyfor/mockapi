import {Form, Button, } from 'antd';
import React from 'react'
import {useDispatch, useSelector} from "react-redux";
import {rallydatasSelector, setRallydataMerge, createRallydata} from "slices/rallydatas";
import {MediaModal} from "components";
import ModalChildRallydata from "./ModalChildRallydata";
import FormRallydata from "./FormRallydata";

const CreateRallydataForm = ({fields}) => {
    const dispatch = useDispatch()
    const {cRallydata, } = useSelector(rallydatasSelector)
    const [form] = Form.useForm()

    return (
        <Form
            form={form}
            layout={`vertical`}
            onFinish={(values) => dispatch(createRallydata(values))}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
        >
            <MediaModal/>
            <ModalChildRallydata/>
            <FormRallydata
                fields={fields}
                form={form}
            />
            <div className="flex items-center justify-end mt-3 ">
                <Button
                    onClick={(e) => dispatch(setRallydataMerge(`cRallydata`, {isOpen: false}))}
                >
                    Cancel
                </Button>
                <Button
                    className="ml-3"
                    type="primary"
                    htmlType="submit"
                    loading={cRallydata.isLoading}
                >
                    Submit
                </Button>
            </div>
        </Form>
    );
};

export default CreateRallydataForm
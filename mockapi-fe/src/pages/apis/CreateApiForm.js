import {Form,  Button} from 'antd';
import {useDispatch, useSelector} from "react-redux";
import {apisSelector, setApiMerge, createApi} from "slices/apis";
import FormApi from "./FormApi";

const CreateApiForm = () => {
    const dispatch = useDispatch()
    const {cApi} = useSelector(apisSelector)

    return (
        <Form
            onFinish={(values) => dispatch(createApi(values))}
            className="border border-indigo-200 p-4 mt-4 rounded-sm"
            layout={`vertical`}
        >
            <FormApi/>
            <div className="flex items-center justify-end mt-3 ">
                <Button
                    onClick={(e) => dispatch(setApiMerge(`cApi`, {isOpen: false}))}
                >
                    Cancel
                </Button>
                <Button
                    className="ml-3"
                    type="primary"
                    htmlType="submit"
                    loading={cApi.isLoading}
                >
                    Submit
                </Button>
            </div>
        </Form>
    )
}

export default CreateApiForm
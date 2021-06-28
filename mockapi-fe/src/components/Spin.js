import {Spin as ASpin} from "antd";

const Spin = ({isActive})=>{
    if(!isActive) return null;
    return(
        <div className="absolute top-0 left-0 right-0 bottom-0 bg-white-70 z-10">
            <ASpin className={`absolute absolute-x absolute-y`}/>
        </div>
    )
}

export {Spin}
import {Progress as AProgress} from 'antd'
import {useState, useEffect} from 'react'

export const Progress = () => {
    const [percent, setPercent] = useState(0)
    const timer = () => setPercent(percent + 1);

    useEffect(
        () => {
            if (percent > 95) {
                return;
            }
            const id = setInterval(timer, 10);
            return () => clearInterval(id);
        },
        [percent]
    );

    return (
        <>
            <AProgress
                percent={percent}
                status={"active"}
                strokeWidth={3}
                showInfo={false}
                className={`fixed top-0 left-0 right-0 -mt-3`}
            />
        </>
    )
}


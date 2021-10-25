import React, {useState, useCallback, useRef, useEffect} from 'react';
import {Table} from 'antd';
import {DndProvider, useDrag, useDrop} from 'react-dnd';
import {HTML5Backend} from 'react-dnd-html5-backend';
import update from 'immutability-helper';
import './index.css';
const uuid = require('react-uuid')

const type = 'DraggableBodyRow';

const DraggableBodyRow = ({index, moveRow, className, style, ...restProps}) => {
    const ref = useRef();
    const [{isOver, dropClassName}, drop] = useDrop({
        accept: type,
        collect: monitor => {
            const {index: dragIndex} = monitor.getItem() || {};
            if (dragIndex === index) {
                return {};
            }
            return {
                isOver: monitor.isOver(),
                dropClassName: dragIndex < index ? ' drop-over-downward' : ' drop-over-upward',
            };
        },
        drop: item => {
            moveRow(item.index, index);
        },
    });
    const [, drag] = useDrag({
        type,
        item: {index},
        collect: monitor => ({
            isDragging: monitor.isDragging(),
        }),
    });
    drop(drag(ref));

    return (
        <tr
            key={uuid()}
            ref={ref}
            className={`${className}${isOver ? dropClassName : ''}`}
            style={{cursor: 'move', ...style}}
            {...restProps}
        />
    );
};

const DragSortingTable = ({columns, dataSource, onChange, isLoading}) => {
    const [data, setData] = useState(dataSource);

    useEffect(() => {
        setData(dataSource);
    }, [dataSource])

    const components = {
        body: {
            row: DraggableBodyRow,
        },
    };

    const moveRow = useCallback(
        (dragIndex, hoverIndex) => {
            const dragRow = data[dragIndex];
            const dataSorted = update(data, {
                $splice: [
                    [dragIndex, 1],
                    [hoverIndex, 0, dragRow],
                ],
            })
            const originalIds = dataSorted.map((item) => item.originalId)
            onChange(originalIds)
            setData(dataSorted);
        },
        [data],
    );

    return (
        <DndProvider backend={HTML5Backend}>
            <Table
                columns={columns}
                dataSource={data}
                components={components}
                onRow={(record, index) => ({
                    index,
                    moveRow,
                })}
                scroll={{x: 1}}
                pagination={{pageSize: 20, hideOnSinglePage: true}}
                loading={isLoading}
            />
        </DndProvider>
    );
};

export default DragSortingTable
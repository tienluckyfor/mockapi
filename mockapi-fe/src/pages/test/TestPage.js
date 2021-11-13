import React from "react";
import ReactDOM from "react-dom";
import {
    SortableContainer,
    SortableElement,
    SortableHandle,
    arrayMove
} from "react-sortable-hoc";
// import arrayMove from "array-move";
import styled from "styled-components";

// import style from "./styles.scss";

const Handle = SortableHandle(({ tabIndex }) => (
    <div tabIndex={tabIndex}>
        <svg viewBox="0 0 50 50">
            <path
                d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 L 0 7.5 z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 L 0 22.5 z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 L 0 37.5 z"
                color="#000"
            />
        </svg>
    </div>
));

const SortableItem = SortableElement(props => {
    const { value: item } = props;
    // console.log(props);
    return (
        <div>
            <div className="content">
                {item.caption}
                {props.shouldUseDragHandle && <Handle />}
            </div>
        </div>
    );
});

const SortableList = SortableContainer(props => {
    const { items, ...restProps } = props;
    return (
        <div>
            {items.map((item, index) => (
                <SortableItem
                    key={`item-${item.id}`}
                    index={index}
                    value={item}
                    {...restProps}
                />
            ))}
        </div>
    );
});


function App() {
    const [photos, setPhotos] = React.useState([
        {
            id: 1,
            preview:
                "https://s3-us-west-1.amazonaws.com/rentzend-dev/user-content/test/file/1f58b506-b788-4802-bab9-718cbc31dbc5.jpg",
            caption: "test 1",
            starred: true
        },
        {
            id: 2,
            preview:
                "https://s3-us-west-1.amazonaws.com/rentzend-dev/user-content/test/file/9515dc3a-cdda-497c-b8fa-e82b3f83b06f.jpg",
            caption: "test 2"
        },
        {
            id: 3,
            preview:
                "https://s3-us-west-1.amazonaws.com/rentzend-dev/user-content/test/file/383ecb2c-a5a1-4aa3-8ab9-0df9858e6802.jpg",
            caption: "test 3"
        },
        {
            id: 4,
            preview:
                "https://s3-us-west-1.amazonaws.com/rentzend-dev/user-content/test/file/61f4e57b-6b15-4091-ae1d-cc90a9ec9662.jpg",
            caption: "test 4"
        },
        {
            id: 5,
            preview:
                "https://s3-us-west-1.amazonaws.com/rentzend-dev/user-content/test/file/1f58b506-b788-4802-bab9-718cbc31dbc5.jpg",
            caption: "test 5"
        },
        {
            id: 6,
            preview:
                "https://s3-us-west-1.amazonaws.com/rentzend-dev/user-content/test/file/9515dc3a-cdda-497c-b8fa-e82b3f83b06f.jpg",
            caption: "test 6"
        }
    ]);

    const onSortEnd = ({ oldIndex, newIndex }) => {
        setPhotos(arrayMove(photos, oldIndex, newIndex));
    };

    return (
        <div>
            <SortableList
                shouldUseDragHandle={true}
                useDragHandle
                axis="xy"
                items={photos}
                onSortEnd={onSortEnd}
            />
        </div>
    );
}

const rootElement = document.getElementById("root");
ReactDOM.render(<App />, rootElement);

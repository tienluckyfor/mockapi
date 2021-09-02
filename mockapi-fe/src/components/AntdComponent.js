import {Avatar as AntAvatar,} from "antd";
import {arrayUniqueByKey, getFirstThumb} from "services";
import React from "react";

export const ShareAvatars = ({user, shares}) => {
    const users = [...(shares ?? []).map(item => item.user_invite), user]
    const usersUnique = arrayUniqueByKey(users, 'id')
    if (usersUnique.length == 1) return <></>
    return <AntAvatar.Group
        size="small" maxCount={2}
        maxStyle={{color: '#f56a00', backgroundColor: '#fde3cf'}}>
        {(usersUnique ?? []).map((user, key) =>
            <AntAvatar
                src={getFirstThumb(user?.medium)}
                key={key}>
                {user?.medium ? null : user?.name.match(/\b(\w)/g).join('')}
            </AntAvatar>
        )}
    </AntAvatar.Group>
}
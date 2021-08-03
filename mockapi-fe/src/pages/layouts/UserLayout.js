import {Button, Menu, PageHeader} from "antd";
import AppHelmet from "shared/AppHelmet";
import {useHistory} from "react-router-dom";
import {authLogout, authsSelector} from "slices/auths";
import React, {useEffect} from "react";
import {useDispatch, useSelector} from "react-redux";
import {usersSelector} from "slices/users";

const UserLayout = ({title, children,}) => {
    const history = useHistory();
    const {loAuth,} = useSelector(authsSelector)
    const {qMe} = useSelector(usersSelector)
    const dispatch = useDispatch()

    return (
        <>
            <AppHelmet title={title}/>
            <PageHeader
                className="px-0 py-0"
                onBack={() => history.goBack()}
                title={<>
                    <span className="text-gray-400 mr-2">Hi</span>
                    {qMe?.data?.name}!
                </>}
                extra={[
                    <Button
                        onClick={() => dispatch(authLogout())}
                        loading={loAuth.isLoading}
                        className="mt-1" type="dashed" danger size="small">Logout</Button>
                ]}
            />
            <Menu mode="horizontal"
                  onClick={(e) => history.push(e.key)}
                  selectedKeys={[window.location.pathname]}
            >
                <Menu.Item key="/UserPage">
                    Me
                </Menu.Item>
                {qMe?.data?.id == 1 &&
                <Menu.Item key="/BackupPage">
                    Backup
                </Menu.Item>
                }
            </Menu>
            {children}
        </>
    )
}

export default UserLayout
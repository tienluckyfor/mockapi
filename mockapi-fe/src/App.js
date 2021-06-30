import {BrowserRouter as Router, Switch, Route, Redirect} from "react-router-dom"
import React, {useEffect, useState} from "react"
import "antd/dist/antd.css";
import "assets/tailwind-output.css";
import {useDispatch} from "react-redux";

import authRoutes from "routes/authRoutes";
import appRoutes from "routes/appRoutes";
import {Loading, Sidebar} from "components";
import {getMe} from "slices/auths";
import Cookies from "universal-cookie";
import UploadPictureWall from "pages/rallydatas/UploadPictureWall"
import CreatePostForm from "pages/CreatePostForm"
import MediaModal from "components/Media/MediaModal"

function App() {
    const dispatch = useDispatch()
    const [href, setHref] = useState(window.location.href)
    const cookies = new Cookies()

    useEffect(() => {
        dispatch(getMe(window.location.href))
    }, [dispatch])

    if (!cookies.get('mockapi-token') && !href.match(/Login|Register/gim)) {
        return (
            <div className={`App`}>
                <Router>
                    <React.Suspense fallback={<Loading/>}>
                        <Switch>
                            {authRoutes.map((props, key) => <Route key={key} {...props} />)}
                            <Route exact path={`/`} render={() => <Redirect to="/LoginPage"/>}/>
                        </Switch>
                    </React.Suspense>
                </Router>
            </div>
        )
    }

    if (href.match(/Login|Register/gim)) {
        return (
            <div className={`App`}>
                <Router>
                    <React.Suspense fallback={<Loading/>}>
                        <Switch>
                            {authRoutes.map((props, key) => <Route key={key} {...props} />)}
                        </Switch>
                    </React.Suspense>
                </Router>
            </div>
        )
    }

    return (
        <div className={`App max-w-screen-lg overflow-hidden flex mx-auto`}>
            <Router>
                <Sidebar/>
                <main className="w-screen py-3 px-4">
                    <React.Suspense fallback={<Loading/>}>
                        <Switch>
                            {appRoutes.map((props, key) => <Route key={key} {...props} />)}
                            <Route exact path={`/`} render={() => <Redirect to="/ApiListPage"/>}/>
                            <Route exact path={`/UploadPictureWall`} component={UploadPictureWall}/>
                            <Route exact path={`/CreatePostForm`} component={CreatePostForm}/>
                            <Route exact path={`/MediaModal`} component={MediaModal}/>
                        </Switch>
                    </React.Suspense>
                </main>
            </Router>
        </div>
    );
}

export default App;

import {BrowserRouter as Router, Switch, Route, Redirect} from "react-router-dom"
import React, {useEffect, useState} from "react"
import "antd/dist/antd.css";
import "assets/tailwind-output.css";

import {isMobile} from 'react-device-detect';
import authRoutes from "routes/authRoutes";
import appRoutes from "routes/appRoutes";
import {Loading, Sidebar} from "components";

function App() {
    const href = window.location.href

    if (href.match(/Login|Register|PasswordPage/gim)) {
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
                <Sidebar className={isMobile ? "hidden" : ""}/>
                <main className="w-screen py-3 px-4">
                    <React.Suspense fallback={<Loading/>}>
                        <Switch>
                            {appRoutes.map((props, key) => <Route key={key} {...props} />)}
                            <Route exact path={`/`} render={() => <Redirect to="/ApiListPage"/>}/>
                        </Switch>
                    </React.Suspense>
                </main>
            </Router>
        </div>
    );
}

export default App;

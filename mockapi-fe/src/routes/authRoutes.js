import React from 'react'
const LoginPage = React.lazy(() => import('pages/auth/LoginPage'))
const RegisterPage = React.lazy(() => import('pages/auth/RegisterPage'))
// const MediaModal = React.lazy(() => import('components/Media/MediaModal'))

// import LoginPage from "pages/auth/LoginPage"
// import RegisterPage from "pages/auth/RegisterPage"

export default [
    { path: '/LoginPage', component: LoginPage },
    { path: '/RegisterPage', component: RegisterPage },
    // { path: '/MediaModal', component: MediaModal },
]
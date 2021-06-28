import React from 'react'
const LoginPage = React.lazy(() => import('pages/auth/LoginPage'))
const RegisterPage = React.lazy(() => import('pages/auth/RegisterPage'))

// import LoginPage from "pages/auth/LoginPage"
// import RegisterPage from "pages/auth/RegisterPage"

export default [
    { path: '/LoginPage', component: LoginPage },
    { path: '/RegisterPage', component: RegisterPage },
]
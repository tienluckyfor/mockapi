import React from 'react'
const LoginPage = React.lazy(() => import('pages/auth/LoginPage'))
const RegisterPage = React.lazy(() => import('pages/auth/RegisterPage'))
const ForgotPasswordPage = React.lazy(() => import('pages/auth/ForgotPasswordPage'))
const ResetPasswordPage = React.lazy(() => import('pages/auth/ResetPasswordPage'))

const routes = [
    { path: '/LoginPage', component: LoginPage },
    { path: '/RegisterPage', component: RegisterPage },
    { path: '/ForgotPasswordPage', component: ForgotPasswordPage },
    { path: '/ResetPasswordPage', component: ResetPasswordPage },
]

export default routes
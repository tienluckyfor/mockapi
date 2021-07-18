import React from 'react'
const ApiListPage = React.lazy(() => import('pages/apis/ApiListPage'))
const ResourceListPage = React.lazy(() => import('pages/resources/ResourceListPage'))
const DatasetListPage = React.lazy(() => import('pages/datasets/DatasetListPage'))
const RallydataPage = React.lazy(() => import('pages/rallydatas/RallydataPage'))
const UserPage = React.lazy(() => import('pages/users/UserPage'))
const SidebarPage = React.lazy(() => import('pages/SidebarPage'))
// const DebounceSelectTest = React.lazy(() => import('pages/DebounceSelectTest'))
// const {Sidebar} = React.lazy(() => import('components/Sidebar'))
// const {Sidebar} = import('components')


export default [
    { path: '/RallydataPage', component: RallydataPage },
    { path: '/DatasetListPage', component: DatasetListPage },
    { path: '/ResourceListPage', component: ResourceListPage },
    { path: '/ApiListPage', component: ApiListPage },
    { path: '/UserPage', component: UserPage },
    // { path: '/DebounceSelectTest', component: DebounceSelectTest },
    // { path: '/JsonEditor', component: JsonEditor },
    { path: '/SidebarPage', component: SidebarPage },
]
import React from 'react'
import DragSortingTable from "components/DragSortingTable";
const ApiListPage = React.lazy(() => import('pages/apis/ApiListPage'))
const ResourceListPage = React.lazy(() => import('pages/resources/ResourceListPage'))
const DatasetListPage = React.lazy(() => import('pages/datasets/DatasetListPage'))
const RallydataPage = React.lazy(() => import('pages/rallydatas/RallydataPage'))
const UserPage = React.lazy(() => import('pages/users/UserPage'))
const BackupPage = React.lazy(() => import('pages/users/BackupPage'))
const SidebarPage = React.lazy(() => import('pages/SidebarPage'))
const TestPage = React.lazy(() => import('pages/test/TestPage'))

export default [
    { path: '/RallydataPage', component: RallydataPage },
    { path: '/DatasetListPage', component: DatasetListPage },
    { path: '/ResourceListPage', component: ResourceListPage },
    { path: '/ApiListPage', component: ApiListPage },
    { path: '/UserPage', component: UserPage },
    { path: '/BackupPage', component: BackupPage },
    { path: '/SidebarPage', component: SidebarPage },
    { path: '/DragSortingTable', component: DragSortingTable },
    { path: '/TestPage', component: TestPage },
]
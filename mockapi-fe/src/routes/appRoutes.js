import React from 'react'
const ApiListPage = React.lazy(() => import('pages/apis/ApiListPage'))
const ResourceListPage = React.lazy(() => import('pages/resources/ResourceListPage'))
const DatasetListPage = React.lazy(() => import('pages/datasets/DatasetListPage'))
const RallydataPage = React.lazy(() => import('pages/rallydatas/RallydataPage'))

export default [
    { path: '/RallydataPage', component: RallydataPage },
    { path: '/DatasetListPage', component: DatasetListPage },
    { path: '/ResourceListPage', component: ResourceListPage },
    { path: '/ApiListPage', component: ApiListPage },
]
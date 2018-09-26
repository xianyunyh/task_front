import Layout from '@/views/layout/Layout'
export default   [
    {path: '/login', component: require('@/views/login/index')},
    {path: '/404', component: require('@/views/404'), hidden: true},

    {
        path: '/',
        component: Layout,
        redirect: '/dashboard',
        name: 'Dashboard',
        hidden: true,
        children: [{
            path: 'dashboard',
            component: require('@/views/dashboard/index')
        }]
    },

    {
        path: '/task',
        component: Layout,
        redirect: '/task/index',
        name: 'Example',
        meta: {title: '任务管理', icon: 'el-icon-tickets'},
        children: [
            {
                path: 'index',
                name: 'list',
                component: require('@/views/task/index'),
                meta: {title: '任务列表', icon: 'table'}
            },
            {
                path: 'add',
                name: 'add',
                hidden: true,
                component: require('@/views/task/add'),
                meta: {title: '添加任务', icon: 'tree'}
            },
            {
                path: 'edit',
                name: 'edit',
                hidden: true,
                component: require('@/views/task/add'),
                meta: {title: '编辑任务', icon: 'tree'}
            },

        ]
    },

    {
        path: '/log',
        component: Layout,
        children: [
            {
                path: 'list',
                name: 'loglist',
                component: require('@/views/form/index'),
                meta: {title: '日志列表', icon: 'form'}
            }
        ]
    },
    {path: '*', redirect: '/404', hidden: true}
]
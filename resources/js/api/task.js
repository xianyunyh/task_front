import request from '@/utils/request'

export function getTaskList(params) {
    return request({
        url: 'v1/task/',
        method: 'get',
        params
    })
}
export  function getTaskInfo(id) {
    return request({
        url: 'v1/task/' + String(id),
        method: 'get'
    })
}
export  function addTask(param) {
    return request({
        url: 'v1/hosts',
        method: 'post',
        data: param
    })
}
export  function updateTask(param) {
    const id = param.id

    return request({
        url: 'v1/hosts/' + String(id),
        method: 'put',
        data: param
    })
}
export  function deleteTask(param) {
    const id = param.id || ""
    if(!id) {
        return false;
    }
    return request({
        url: 'v1/hosts/' + String(id),
        method: 'delete',
        param:param
    })
}
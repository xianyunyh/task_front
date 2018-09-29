import request from '@/utils/request'

export function getHostList(params) {
    return request({
        url: 'v1/hosts/',
        method: 'get',
        params
    })
}
export  function getHostInfo(id) {
    return request({
        url: 'v1/hosts/' + String(id),
        method: 'get'
    })
}

export  function updateHost(param) {
    const id = param.id
    return request({
        url: 'v1/hosts/' + String(id),
        method: 'put',
        param:param
    })
}
<template>
    <div class="app-container">
        <el-table :data="list" v-loading="listLoading" element-loading-text="Loading" border fit highlight-current-row>
            <el-table-column align="center" label='ID' width="95">
                <template slot-scope="scope">
                    {{++scope.$index}}
                </template>
            </el-table-column>
            <el-table-column label="任务名字"  width="110" >
                <template slot-scope="scope">
                    {{scope.row.name}}
                </template>
            </el-table-column>
            <el-table-column label="脚本"  align="center">
                <template slot-scope="scope">
                    <span>{{scope.row.cmd}}</span>
                </template>
            </el-table-column>
            <el-table-column label="主机" width="110" align="center">
                <template slot-scope="scope">
                    {{scope.row.host}}
                </template>
            </el-table-column>
            <el-table-column class-name="status-col" label="周期" width="110" align="center">
                <template slot-scope="scope">
                    {{scope.row.cycle}}
                </template>
            </el-table-column>
            <el-table-column class-name="status-col" label="下次执行时间" width="110" align="center">
                <template slot-scope="scope">
                    {{scope.row.next_time}}
                </template>
            </el-table-column>
            <el-table-column align="center" prop="created_at" label="创建时间" width="200">
                <template slot-scope="scope">
                    <i class="el-icon-time"></i>
                    <span>{{scope.row.created_at}}</span>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import { getTaskList } from '@/api/task'

    export default {
        data() {
            return {
                list: null,
                listLoading: false
            }
        },
        filters: {
            statusFilter(status) {
                const statusMap = {
                    published: 'success',
                    draft: 'gray',
                    deleted: 'danger'
                }
                return statusMap[status]
            }
        },
        created() {
            this.fetchData()
        },
        methods: {
            fetchData() {
                this.listLoading = true
                getTaskList(this.listQuery).then(response => {
                    this.list = response.data
                    this.listLoading = false
                })
            }
        }
    }
</script>

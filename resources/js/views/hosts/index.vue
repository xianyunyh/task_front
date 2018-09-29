<template>
    <div class="app-container">
        <el-table :data="list" v-loading="listLoading" element-loading-text="Loading" border fit highlight-current-row>
            <el-table-column align="center" label='ID' width="95">
                <template slot-scope="scope">
                    {{scope.$index}}
                </template>
            </el-table-column>
            <el-table-column label="名字">
                <template slot-scope="scope">
                    {{scope.row.name}}
                </template>
            </el-table-column>
            <el-table-column label="主机地址" align="center">
                <template slot-scope="scope">
                    <span>{{scope.row.host}}</span>
                </template>
            </el-table-column>
            <el-table-column label="通信端口" align="center">
                <template slot-scope="scope">
                    {{scope.row.port}}
                </template>
            </el-table-column>
            <el-table-column label="命令" align="center">
                <template slot-scope="scope">
                    {{scope.row.cmd}}
                </template>
            </el-table-column>
            <el-table-column class-name="status-col" width="100" label="启用状态" align="center">
                <template slot-scope="scope">
                    <span v-if="scope.row.status === 1">启用</span>
                    <span v-else="">关闭</span>

                </template>
            </el-table-column>
            <el-table-column align="center" prop="created_at" label="创建时间">
                <template slot-scope="scope">
                    <span>{{scope.row.created_at}}</span>
                </template>
            </el-table-column>
            <el-table-column align="center" width="300" label="操作">
                <template slot-scope="scope">
                    <el-button type="primary" size="small"  @click="editRecord(scope.row.status)" icon="el-icon-edit">
                        编辑
                    </el-button>
                    <el-button type="danger" size="small" @click="deleteRecord(scope.row.status)" icon="el-icon-delete">
                        删除
                    </el-button>

                </template>
            </el-table-column>
        </el-table>
        <el-dialog title="修改主机信息" :visible.sync="dialogFormVisible" width="450px">
            <el-form :model="form">
                <el-form-item label="主机名字" :label-width="formLabelWidth">
                    <el-input v-model="form.name" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="主机地址" :label-width="formLabelWidth">
                    <el-input v-model="form.host" placeholder="">

                    </el-input>
                </el-form-item>
                <el-form-item label="主机端口" :label-width="formLabelWidth">
                        <el-input v-model="form.port" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="是否启用" :label-width="formLabelWidth">
                    <el-select v-model="form.status">
                        <el-option label="启用" value="1"></el-option>
                        <el-option label="关闭" value="0"></el-option>
                    </el-select>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
                <el-button @click="dialogFormVisible = false">取 消</el-button>
                <el-button type="primary" @click="doEdit">修改</el-button>
            </div>
        </el-dialog>

    </div>
</template>

<script>
    import {getHostList,getHostInfo} from '@/api/hosts'

    export default {
        data() {
            return {
                list: null,
                listLoading: false,
                dialogTableVisible: false,
                dialogFormVisible: false,
                form: {
                    id: '',
                    name: '',
                    port: '',
                    host: '',
                    status: ''
                },
                formLabelWidth: '80px'
            }
        },
        filters: {
            statusFilter(status) {
                const statusMap = {
                    published: 'success',
                    draft: 'gray',
                    deleted: 'danger'
                };
                return statusMap[status]
            }
        },
        created() {
            this.fetchData()
        },
        methods: {
            async fetchData() {
                this.listLoading = true;
                let response = await  getHostList(this.listQuery)
                this.list = response.data;
                this.listLoading = false
            },
            deleteRecord(id) {
                this.$confirm('此操作将删除该记录, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    this.$message({
                        type: 'success',
                        message: '删除成功!'
                    });
                }).catch(() => {
                })
            },
            async editRecord(id) {
                let response = await  getHostInfo(id);
                this.form = response.data
                this.dialogFormVisible = true;
            },
            doEdit() {
                const post = this.form

                this.dialogFormVisible = false
            }

        }
    }
</script>

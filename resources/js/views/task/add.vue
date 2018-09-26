<template>
    <div class="app-container">
        <el-form id="form" ref="form" :model="form" label-width="120px" width="960">
            <el-form-item label="任务名字">
                <el-input class="input" v-model="form.name" size="medium"></el-input>
            </el-form-item>
            <el-form-item label="选择主机">
                <el-select size="medium" value="" v-model="form.region" placeholder="please select your host">
                    <el-option label="Zone one" value="shanghai"></el-option>
                    <el-option label="Zone two" value="beijing"></el-option>
                </el-select>
            </el-form-item>
            <el-form-item label="cron">
                <el-input class="input"  v-model="form.cmd" size="medium"></el-input>
            </el-form-item>
            <el-form-item label="超时时间">
                <el-input class="input" type="number"  v-model="form.timeout" size="medium"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">添加</el-button>
                <el-button @click="onCancel">取消</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    region: '',
                    date1: '',
                    date2: '',
                    delivery: false,
                    type: [],
                    resource: '',
                    desc: ''
                }
            }
        },
        methods: {
            onSubmit() {
                this.$message('submit!')
            },
            onCancel() {
                this.$message({
                    message: 'cancel!',
                    type: 'warning'
                })
            }
        }
    }
</script>

<style scoped>
    .line{
        text-align: center;
    }
    .input{
        width:400px;
    }
    #form{
        width: 960px;
        padding:40px
    }
</style>


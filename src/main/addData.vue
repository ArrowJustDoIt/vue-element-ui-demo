<template>
    <div>
        <el-breadcrumb separator-class="el-icon-arrow-right" class="header-right">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>添加数据</el-breadcrumb-item>
        </el-breadcrumb>
        <el-form ref="form" :model="form" label-width="80px">
            <el-form-item label="日期">
                <el-col :span="11">
                    <el-date-picker type="date" placeholder="选择日期" v-model="form.date"
                                    style="width: 100%;"></el-date-picker>
                </el-col>
            </el-form-item>
            <el-form-item label="姓名">
                <el-input v-model="form.name"></el-input>
            </el-form-item>
            <el-form-item label="省份">
                <el-input v-model="form.province"></el-input>
            </el-form-item>
            <el-form-item label="市区">
                <el-input v-model="form.city"></el-input>
            </el-form-item>
            <el-form-item label="地址">
                <el-input v-model="form.address"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    import axios from 'axios'
    import {Message} from 'element-ui'

    export default {
        data() {
            return {
                form: {
                    date: '',
                    name: '',
                    province: '',
                    city: '',
                    address: '',
                    code: '',
                },
            }
        },
        methods: {
            onSubmit() {
                let self = this;
                axios.get('http://localhost/index.php', {
                    params: {
                        type: 'insert',
                        date: self.form.date,
                        name: self.form.name,
                        province: self.form.province,
                        city: self.form.city,
                        address: self.form.address,
                    }
                })
                .then(response => {
                    if (response.status == 200) {
                        self.$message({
                            type: 'success',
                            showClose: true,
                            message: '添加成功!',
                            duration:2000,
                            onClose(msg){
                                self.$router.push("/")
                            }
                        });
                    }
                })
            }
        }

    }
</script>
<template>
    <div>
        <el-breadcrumb separator-class="el-icon-arrow-right" class="header-right">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>更新数据</el-breadcrumb-item>
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
                <el-button type="primary" @click="onSubmit">立即更新</el-button>
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
                },
                data: '',
            }
        },
        mounted() {
            this.data = JSON.parse(sessionStorage.getItem('data'))
            // axios.get("http://localhost/index.php?id=" + this.data.id)
            axios.get('http://localhost/index.php', {
                params: {
                    type: 'show',
                    id: this.data.id
                }
            })
                .then(data => {
                    this.form.date = data.data.date,
                        this.form.name = data.data.name,
                        this.form.province = data.data.province,
                        this.form.city = data.data.city,
                        this.form.address = data.data.address
                })
        },
        methods: {
            onSubmit() {
                axios.get('http://localhost/index.php', {
                    params: {
                        type: 'update',
                        id: this.data.id,
                        date: this.form.date,
                        name: this.form.name,
                        province: this.form.province,
                        city: this.form.city,
                        address: this.form.address,
                    }
                })
                    .then(function (response) {
                        if (response.status == 200) {
                            Message({
                                type: 'success',
                                showClose: true,
                                message: '添加成功!'
                            });
                        }
                    })
            }
        }

    }
</script>
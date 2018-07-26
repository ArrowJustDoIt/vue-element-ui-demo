<template>
    <div>
        <el-breadcrumb separator-class="el-icon-arrow-right" class="header-right">
            <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
            <el-breadcrumb-item>查看详情</el-breadcrumb-item>
        </el-breadcrumb>
        <el-table :data="tableData" border style="width: 100%">
            <el-table-column fixed prop="date" label="日期" width="150">
            </el-table-column>
            <el-table-column prop="name" label="姓名" width="120">
            </el-table-column>
            <el-table-column prop="province" label="省份" width="120">
            </el-table-column>
            <el-table-column prop="city" label="市区" width="120">
            </el-table-column>
            <el-table-column prop="address" label="地址" width="300">
            </el-table-column>
        </el-table>
    </div>
</template>
<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                tableData: [],
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
                this.tableData = [data.data]
            })
        },
    }

</script>

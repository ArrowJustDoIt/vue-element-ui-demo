<template>
    <div>
        <router-link to="main/addData" class="add">
            <el-button icon="el-icon-plus" circle></el-button>
        </router-link>
        <el-button icon="el-icon-delete" circle type="danger" class="deleteAll" @click="deleteAll"></el-button>
        <el-table
                :data="tableData"
                border
                style="width: 100%"
                @selection-change="handleSelectionChange">
            <el-table-column
                    type="selection">
            </el-table-column>
            <el-table-column
                    fixed
                    prop="date"
                    label="日期">
            </el-table-column>
            <el-table-column
                    prop="name"
                    label="姓名">
            </el-table-column>
            <el-table-column
                    prop="province"
                    label="省份">
            </el-table-column>
            <el-table-column
                    prop="city"
                    label="市区">
            </el-table-column>
            <el-table-column
                    prop="address"
                    label="地址">
            </el-table-column>
            <el-table-column
                    fixed="right"
                    label="操作">
                <template slot-scope="scope">
                    <el-button icon="el-icon-search" circle @click="handleClick(scope.row,'detail')"
                               size="small"></el-button>
                    <el-button type="primary" icon="el-icon-edit" circle @click="handleClick(scope.row,'update')"
                               size="small"></el-button>
                    <el-button type="danger" icon="el-icon-delete" circle @click="deleteData(scope.row)"
                               size="small"></el-button>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    import axios from 'axios'
    import {Message} from 'element-ui'

    export default {
        data() {
            return {
                tableData: [],
                selectionValue:[],
            }
        },
        mounted() {
            axios.get("http://localhost/index.php")
                .then(data => {
                    this.tableData = data.data
                })
        },
        methods: {
            handleClick(row, status) {
                var url = '';
                switch (status) {
                    case 'detail':
                        url = '/main/showDetail';
                        break;
                    case 'update':
                        url = '/main/updateData';
                        break;
                }
                sessionStorage.setItem('data', JSON.stringify({
                    id: row.id,
                }))
                this.$router.push(url);
            },
            deleteData(row) {
                this.$confirm('是否删除该条数据?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    this.post(row.id)
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: '已取消删除'
                    });
                });
            },
            post(id) {
                axios.get('http://localhost/index.php', {
                    params: {
                        type: 'delete',
                        id: id,
                    }
                })
                .then(response => {
                    if (response.status == 200) {
                        this.$message({
                            type: 'success',
                            showClose: true,
                            message: '删除成功!',
                            duration:2000,
                            onClose(msg){
                                window.location.reload();
                            }
                        });
                        
                    }
                })
            },
            handleSelectionChange(val){
                this.selectionValue = val;
            },
            deleteAll(){
                var rows = this.selectionValue;
                rows.forEach(row => {
                    console.log(row.id)
                });
                
            },
        },
    }
</script>
<style>
    .add {
        position: absolute;
        left: 280px;
        top: 70px;
    }
    .deleteAll{
        position: absolute;
        left: 340px;
        top: 70px;
    }
</style>
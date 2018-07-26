<template>
    <el-container direction='horizontal' v-bind:style="{height:fullheight}">
        <el-aside width="200px" id="app" background-color="#545c64">
            <el-menu
                    default-active="2"
                    class="el-menu-vertical-demo"
                    @open="handleOpen"
                    @close="handleClose"
                    background-color="#545c64"
                    text-color="#fff"
                    active-text-color="#ffd04b">
                <i class="el-icon-picture-outline" style="font-size: 100px;"></i>
                <el-menu-item index="2">
                    <i class="el-icon-menu"></i>
                    <span slot="title"><router-link to="/foo">Go to Foo</router-link></span>
                </el-menu-item>
                <el-menu-item index="4">
                    <i class="el-icon-setting"></i>
                    <span slot="title"><router-link to="/bar">Go to Bar</router-link></span>
                </el-menu-item>
            </el-menu>
        </el-aside>
        <el-container>
            <el-header>
                <el-menu
                        default-active="1"
                        class="el-menu-demo"
                        mode="horizontal"
                        background-color="#545c64"
                        text-color="#fff"
                        active-text-color="#ffd04b">
                    <!-- <el-menu-item @click="goback()">返回</el-menu-item> -->
                    <el-menu-item index="1">
                        <router-link to="/">首页</router-link>
                    </el-menu-item>
                    <el-submenu index="2">
                        <template slot="title">我的工作台</template>
                        <el-menu-item index="2-1">选项1</el-menu-item>
                        <el-menu-item index="2-2">选项2</el-menu-item>
                        <el-menu-item index="2-3">选项3</el-menu-item>
                        <el-submenu index="2-4">
                            <template slot="title">选项4</template>
                            <el-menu-item index="2-4-1">选项1</el-menu-item>
                            <el-menu-item index="2-4-2">选项2</el-menu-item>
                            <el-menu-item index="2-4-3">选项3</el-menu-item>
                        </el-submenu>
                    </el-submenu>
                    <el-menu-item index="3" disabled>消息中心</el-menu-item>
                    <el-menu-item index="4"><a href="https://www.ele.me" target="_blank">订单管理</a></el-menu-item>
                </el-menu>
            </el-header>
            <el-main>
                <el-button icon="el-icon-arrow-left" circle @click="goback()" class="goback"></el-button>
                <router-view style="margin-top:40px"></router-view>
            </el-main>
        </el-container>
    </el-container>
</template>

<script>
    export default {
        name: 'App',
        data() {
            return {
                fullheight: document.documentElement.clientHeight + 'px',
            }
        },
        mounted() {
            // console.log(document.documentElement.clientHeight);
        },
        methods: {
            goback() {
                this.$router.go(-1);
            },
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>

<style>
    .el-menu-vertical-demo {
        height: 100%
    }

    .el-header, .el-footer {
        padding: 0px;
        background-color: #B3C0D1;
        color: #333;
        line-height: 60px;
    }

    .el-table th {
        text-align: center;
    }

    .el-aside {
        background-color: #D3DCE6;
        color: #333;
        text-align: center;
        line-height: 30px;
    }

    .el-main {
        background-color: #E9EEF3;
        color: #333;
        text-align: center;
    }

    body {
        margin: 0px;
    }

    /* body > .el-container {
     height: 100%;
     margin-bottom: 40px;
      }  */
    .el-container:nth-child(5) .el-aside,
    .el-container:nth-child(6) .el-aside {
        line-height: 260px;
    }

    .el-container:nth-child(7) .el-aside {
        line-height: 320px;
    }

    .header-right {
        position: fixed;
        right: 30px;
        top: 85px;
    }

    .goback {
        position: absolute;
        left: 220px;
        top: 70px;
    }

</style>
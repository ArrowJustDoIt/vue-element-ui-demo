import Vue from 'vue'
import Router from 'vue-router'


Vue.use(Router)
const index = () => import('../main/index')
const showDetail = () => import('../main/showDetail')
const addData = () => import('../main/addData')
const updateData = () => import('../main/updateData')
const foo = { template: '<div>foo</div>' }
const bar = { template: '<div>bar</div>' }

export default new Router({
  routes: [
    {
		path: '/',
		name: 'index',
		component: index,
    },
    {
	    path: '/foo',
	    name: 'foo',
	    component: foo,
	},
	{
	    path: '/bar',
	    name: 'bar',
	    component: bar,
	},
	{
		path: '/main/showDetail',
		name: 'showDetail',
		component: showDetail,
    },
    {
		path: '/main/addData',
		name: 'addData',
		component: addData,
    },
    {
		path: '/main/updateData',
		name: 'updateData',
		component: updateData,
    },
  ]
})

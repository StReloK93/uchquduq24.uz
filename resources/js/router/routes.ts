import { RouteRecordRaw } from 'vue-router'

export const routes: RouteRecordRaw[] = [
	{
		path: '/',
		component: () => import('@/pages/Home.vue'),
		name: 'main',
	},
	{
		path: '/posts/:id',
		component: () => import('@/pages/Home.vue'),
		name: 'posts',
		props: true
	},
	{
		path: '/post/:id',
		component: () => import('@/pages/Post.vue'),
		name: 'post',
		props: true
	},
	{
		path: '/about',
		component: () => import('@/pages/About.vue'),
		name: 'about',
	},
	{
		path: '/contacts',
		component: () => import('@/pages/Contacts.vue'),
		name: 'contacts',
	},
	{
		path: '/login',
		component: () => import('@/pages/Login.vue'),
		name: 'login',
		meta: {
			guard: 'guest',
		},
	},
	{
		path: '/admin/:id',
		component: () => import('@/pages/AdminPages/AdminHome.vue'),
		name: 'admin',
		meta: {
			guard: 'auth',
			adminPage: true
		}
	}
]


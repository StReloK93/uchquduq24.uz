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
	}
]

// meta: {
// 	guard: 'auth',
// },
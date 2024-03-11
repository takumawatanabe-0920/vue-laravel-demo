import { createRouter, createWebHistory } from 'vue-router'
import Home from '../view/Home.vue'

const routes = [
  {
    path: '/',
    name: 'HomePage',
    component: Home,
  },
  {
    path: '/tag',
    name: 'TagPage',
    component: () =>
      import(/* webpackChunkName: "TagPage" */ '../view/Tag.vue'),
  },
  {
    path: '/login',
    name: 'LoginPage',
    component: () =>
      import(/* webpackChunkName: "LoginPage" */ '../view/Login.vue'),
  },
  {
    path: '/register',
    name: 'SignupPage',
    component: () =>
      import(/* webpackChunkName: "SignupPage" */ '../view/Register.vue'),
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})
export default router

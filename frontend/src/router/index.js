import { createRouter, createWebHistory } from 'vue-router'
import Home from '../view/Home.vue'
const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  // {
  //   path: '/about',
  //   name: 'About',
  //   component: () => import('../view/Home.vue'),
  // },
]
const router = createRouter({
  history: createWebHistory(),
  routes,
})
export default router

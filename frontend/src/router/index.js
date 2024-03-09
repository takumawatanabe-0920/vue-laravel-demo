import { createRouter, createWebHistory } from 'vue-router'
import Home from '../view/Home.vue'
import Tag from '../view/Tag.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/tag',
    name: 'Tag',
    component: Tag,
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})
export default router

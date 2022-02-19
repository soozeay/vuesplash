import { createRouter, createWebHistory } from 'vue-router';
import PhotoList from './pages/PhotoList.vue';
import Login from './pages/Login.vue';

const routes = [
  {
    path: '/',
    name: 'PhotoList',
    component: PhotoList
  },
  {
    path: '/login',
    name: 'Login',
    component: Login
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

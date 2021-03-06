import { createRouter, createWebHistory } from 'vue-router';
import PhotoList from './pages/PhotoList.vue';
import SystemError from './pages/errors/System.vue';
import store from './store';
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
    component: Login,
    beforeEnter (to, from, next) {
      if (store.getters['auth/check']) {
        next('/')
      } else {
        next()
      }
    }
  },
  {
    path: '/500',
    component: SystemError
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

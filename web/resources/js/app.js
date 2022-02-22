require('./bootstrap');
import { createApp } from 'vue'
import router from './router'
import store from './store'
import App from './App.vue'
import './bootstrap'

const app = createApp({
  template: "<App />",
  components: { App }
})

app.use(router)
app.use(store)
app.mount('#app')

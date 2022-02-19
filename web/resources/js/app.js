require('./bootstrap');
import { createApp } from 'vue'
import router from './router'
import App from './App.vue'

const app = createApp({
  template: "<App />",
  components: { App }
})

app.use(router)
app.mount('#app')

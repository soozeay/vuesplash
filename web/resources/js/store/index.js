import { createStore } from 'vuex'
import auth from './auth'
import error from './error'

export default createStore({
  modules: {
    auth,
    error
  }
})


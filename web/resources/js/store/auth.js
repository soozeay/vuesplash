const state = {
  user: null
}

const getters = {}

const mutations = {
  setuser (state, user) {
    state.user = user
  }
}

const actions = {
  async register (context, data) {
    const response = await axios.post('/api/register', data)
    console.log(response)
    context.commit('setUser', response.data)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}

import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    token: ""
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
      localStorage.setItem("token", token);
    }
  },
  actions: {},
  modules: {},
  getters: {
    getToken(state) {
      if (state.token) state.token = localStorage.getItem("token");
      return state.token;
    }
  }
});

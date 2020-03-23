import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    token: null
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
      localStorage.setItem("token", JSON.stringify(token));
    }
  },
  getters: {
    getToken(state) {
      if (state.token == "") state.token = JSON.parse(localStorage.getItem("token"));
      return state.token;
    }
  }
});

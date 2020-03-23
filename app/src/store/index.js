import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    token: "",
    user: null
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
      localStorage.setItem("token", token);
    },
    setUser(state, user) {
      state.user = user;
      localStorage.setItem("user", JSON.stringify(user));
    }
  },
  getters: {
    getToken(state) {
      if (state.token == "") state.token = localStorage.getItem("token");
      return state.token;
    },
    getUser(state) {
      if (state.user == null) state.user = JSON.parse(localStorage.getItem("user"));
      return state.user;
    }
  }
});

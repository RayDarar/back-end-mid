import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    token: null,
    news: {
      search: ""
    }
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
      localStorage.setItem("token", JSON.stringify(token));
    },
    exit(state) {
      state.token = null;
      localStorage.removeItem("token");
    },
    newQuery(state, query) {
      state.news.search = query;
    }
  },
  getters: {
    getToken(state) {
      if (state.token == null) state.token = JSON.parse(localStorage.getItem("token"));
      return state.token;
    }
  }
});

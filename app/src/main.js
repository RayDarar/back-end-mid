import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";

import AlertBox from "./components/AlertBox.vue";
import BaseInput from "./components/BaseInput.vue";
import BaseRadio from "./components/BaseRadio.vue";
import IconText from "./components/IconText.vue";

Vue.config.productionTip = false;

Vue.component("alert-box", AlertBox);
Vue.component("base-input", BaseInput);
Vue.component("base-radio", BaseRadio);
Vue.component("icon-text", IconText);

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount("#app");

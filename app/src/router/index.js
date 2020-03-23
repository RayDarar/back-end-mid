import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      component: () => import("@/views/HomePage/index")
    },
    {
      path: "/welcome",
      component: () => import("@/views/WelcomePage/index")
    },
    {
      path: "/welcome/sign-in",
      component: () => import("@/views/SignIn/index")
    },
    {
      path: "/welcome/sign-up",
      component: () => import("@/views/SignUp/index")
    },
    {
      path: "/test",
      component: () => import("@/views/Test")
    }
  ]
});

export default router;

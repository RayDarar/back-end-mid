<template>
  <article id="app">
    <transition :name="slideName" mode="out-in">
      <router-view class="component"></router-view>
    </transition>
  </article>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      slideName: "slide-left"
    };
  },
  watch: {
    $route(to, from) {
      const toDepth = to.path.split("/").length;
      const fromDepth = from.path.split("/").length;
      this.slideName = toDepth < fromDepth ? "slide-right" : "slide-left";
    }
  }
};
</script>

<style lang="scss">
@import "./scss/_globals.scss";

@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");

@font-face {
  font-family: GilroyLight;
  src: url("./assets/fonts/Gilroy-Light.otf");
}

@font-face {
  font-family: GilroyBold;
  src: url("./assets/fonts/Gilroy-ExtraBold.otf");
}

html {
  font-size: 100%;
}

*::-webkit-scrollbar {
  width: 0.5em;
}

*::-webkit-scrollbar-thumb {
  background-color: $accentBlue;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  border: none;
  outline: none;
  font-size: 1rem;
  font-family: GilroyLight;
}

#app {
  width: 100vw;
  height: 100vh;
}

.component {
  overflow: hidden;
}

@media screen and (max-width: 1440px) {
  html {
    font-size: 90%;
  }
}

@media screen and (max-width: 1280px) {
  
}
</style>

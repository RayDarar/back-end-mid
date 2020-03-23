<template>
  <header id="header">
    <img src="@/assets/logo-text.png" alt="logo" class="logo" />
    <nav class="nav">
      <li
        class="nav-item"
        v-for="item in navItems"
        :key="item.name"
        :title="`to ${item.name}`"
        @click="$router.push('/')"
      >
        {{ item.name }}
      </li>
    </nav>
  </header>
</template>

<script>
export default {
  name: "WelcomePageHeader",
  data() {
    return {
      navItems: [
        {
          name: "Home",
          ref: ""
        },
        {
          name: "Profile",
          ref: ""
        },
        {
          name: "Messages",
          ref: ""
        },
        {
          name: "Friends",
          ref: ""
        },
        {
          name: "Communities",
          ref: ""
        },
        {
          name: "Map",
          ref: ""
        },
        {
          name: "Eco Projects",
          ref: ""
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
@import "../../scss/_globals.scss";

#header {
  height: 100%;
  grid-column: 1 / 5;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.logo {
  max-height: 80%;
  margin-right: 1em;
}

.nav {
  display: flex;
  flex-direction: row;
  align-items: center;
  list-style: none;

  &-item {
    margin: 0.5em;
    font-family: GilroyLight;
    color: $accentWhite;
    font-size: 1.2rem;
    opacity: 0.8;
    transition: opacity 0.3s;
    cursor: pointer;

    position: relative;
    padding: 0.5em;
    white-space: nowrap;

    &:hover {
      opacity: 1;
    }
  }
  width: 100%;
}
</style>

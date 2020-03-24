<template>
  <header id="header">
    <img src="@/assets/logo-text.png" alt="logo" class="logo" />
    <input type="text" class="search" placeholder="Search" />
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
@import "../../scss/_base.scss";

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

.search {
  display: none;
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

@media screen and (max-width: 1440px) {
}

@media screen and (max-width: 840px) {
  #header {
    position: fixed;
    top: 0px;
    left: 0;
    width: 100%;
    height: 100px;
    background-color: $blackBackground;
    z-index: 2;

    display: grid;
    grid-template-columns: 1fr 3fr;
    grid-template-rows: 1fr 1fr;
    justify-items: center;
    align-items: center;
  }

  .logo {
    @include pos(1, 1);
  }

  .search {
    display: block;
    width: 80%;
    padding: 0.3em 1em;
    border: 4px solid $accentBlue;
    border-radius: 10px;
  }

  .nav {
    @include pos(1, 2, 3, 2);
    width: 100%;
  }
}
</style>

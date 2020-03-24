<template>
  <header id="header">
    <picture class="logo">
      <source srcset="@/assets/kokoko.svg" media="(max-width: 450px)" />
      <img src="@/assets/logo-text.png" alt="logo" />
    </picture>
    <input type="text" class="search" placeholder="Search" />
    <nav class="nav">
      <li
        class="nav-item"
        v-for="(item, index) in navItems"
        :key="item.name"
        :title="`to ${item.name}`"
        @click="$router.push('/')"
      >
        <span class="nav-item__text">{{ item.name }}</span>
        <img
          :src="getImage(item.image)"
          :alt="item.image"
          class="nav-item__icon"
          :class="{ 'nav-item__icon_big': index == 2 }"
        />
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
          image: "news.svg"
        },
        {
          name: "Profile",
          image: "profile.svg"
        },
        {
          name: "Messages",
          image: "notification.svg"
        },
        {
          name: "Friends",
          image: "friend.svg"
        },
        {
          name: "Communities",
          image: "comment.svg"
        },
        {
          name: "Map",
          image: "pin.svg"
        },
        {
          name: "Eco Projects",
          image: "gear.svg"
        }
      ]
    };
  },
  methods: {
    getImage(image) {
      const images = require.context("@/assets/", false, /[\.png\.svg]$/);
      return images("./" + image);
    }
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

  * {
    height: 50px;
  }
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
    opacity: 0.8;
    transition: opacity 0.3s;
    cursor: pointer;

    position: relative;
    padding: 0.5em;

    &__text {
      white-space: nowrap;
      font-family: GilroyLight;
      color: $accentWhite;
      font-size: 1.2rem;
    }

    &__icon {
      display: none;
    }

    &:hover {
      opacity: 1;
    }
  }
  width: 100%;
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
    * {
      height: 45px;
    }
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

@media screen and (max-width: 450px) {
  #header {
    padding: 0.5em;
  }

  .logo {
    * {
      height: 34px;
    }
  }

  .nav {
    align-self: flex-end;
    justify-content: space-around;
    align-items: center;

    &-item {
      padding: 0;
      margin: 0em;
      &__text {
        display: none;
      }

      &__icon {
        display: block;
        width: 20px;
        height: 20px;
        &_big {
          width: 28px;
          height: 28px;
        }
      }
    }
  }
}
</style>

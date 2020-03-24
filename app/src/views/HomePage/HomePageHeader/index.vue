<template>
  <header class="header">
    <div class="top">
      <picture class="logo">
        <source srcset="@/assets/kokoko.svg" media="(max-width: 840px)" />
        <img src="@/assets/logo-text.png" alt="logo" />
      </picture>
      <header-search></header-search>
      <div class="account-wrapper">
        <alert-box :time="2000" ref="topBox"></alert-box>
        <img src="@/assets/profile.svg" alt="profile-image" />
        <span v-if="user">{{ user.name }} {{ user.surname }}</span>
        <span v-else>User</span>
      </div>
      <img
        src="@/assets/notification.svg"
        alt="notification"
        class="notification"
        @click="alertTopBox"
      />
      <img src="@/assets/gear.svg" alt="configs" class="configs" @click="alertTopBox" />
    </div>
    <nav class="nav">
      <ul class="list">
        <alert-box ref="headBox" :time="1500"></alert-box>
        <li
          class="nav-item"
          :class="{ 'nav-item_selected': !index }"
          v-for="(item, index) in navItems"
          :key="item.name"
          @click="call(index !== 7)"
        >
          <span class="nav-item__text">{{ item.name }}</span>
          <img
            :src="getImage(item.image)"
            :alt="item.image"
            class="nav-item__icon"
            :class="{ 'nav-item__icon_big': index == 2 }"
          />
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
import HeaderSearch from "./HeaderSearch";

export default {
  name: "HomePageHeader",
  components: {
    HeaderSearch
  },
  computed: {
    user() {
      return this.$store.state.token;
    }
  },
  data() {
    return {
      navItems: [
        {
          name: "News",
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
        },
        {
          name: "Logout",
          image: "repost.svg"
        }
      ]
    };
  },
  methods: {
    alertTopBox() {
      this.$refs.topBox.alert("Sorry, still in development");
    },
    exit() {
      this.$store.commit("exit");
      this.$router.push("/welcome");
    },
    call(flag) {
      if (flag) this.alertTopBox();
      else this.exit();
    },
    getImage(image) {
      const images = require.context("@/assets/", false, /[\.png\.svg]$/);
      return images("./" + image);
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";
@import "../../../scss/_base.scss";

.header {
  background-color: $blackBackground;
  position: fixed;
  width: 100%;
  z-index: 1;
}

.logo {
  * {
    height: 48px;
  }
}

.top {
  height: 72px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin-left: 20%;
  width: 60%;

  .account-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    height: 50%;

    img {
      height: 80%;
      margin-right: 1em;
    }
  }

  .notification,
  .configs {
    cursor: pointer;
    height: 40%;
  }

  .configs {
    position: relative;
    top: 3px;
  }
}

.nav {
  height: 72px;
  background-color: white;
  border: none;

  .list {
    list-style: none;
    display: flex;
    align-items: center;
    height: 100%;
    margin-left: 20%;
    width: 60%;
    position: relative;

    .nav-item {
      margin: 1em;

      &__text {
        font-size: 1.2rem;
        color: $grayText;
        white-space: nowrap;
        font-family: GilroyLight;
      }

      &__icon {
        display: none;
      }

      &:after {
        content: "";
        transform: scale(0);
      }
    }

    .nav-item_selected,
    .nav-item:hover {
      color: black;
      position: relative;
      transition: all 0.3s;
      cursor: pointer;

      &:after {
        transition: all 0.3s;
        content: "";
        position: absolute;
        left: 0;
        width: 100%;
        bottom: -25px;
        height: 3px;
        background-color: $accentBlue;
        transform: scale(1);
      }
    }
  }
}

@media screen and (max-width: 1440px) {
  .top,
  .nav .list {
    margin-left: 10%;
    width: 80%;
  }
}

@media screen and (max-width: 840px) {
  .top,
  .nav .list {
    width: 90%;
    margin-left: 5%;
  }

  .logo {
    * {
      height: 48px;
    }
  }

  .top {
    height: 68px;
  }
  .nav {
    height: 68px;

    .list {
      .nav-item {
        margin: 0.5em;
        font-size: 1.1rem;
      }
    }
  }
}

@media screen and (max-width: 450px) {
  .logo {
    * {
      height: 34px;
    }
    margin-right: 3em;
  }

  .top {
    justify-content: flex-start;
    width: 200%;

    .account-wrapper {
      display: none;
    }

    .notification,
    .configs {
      display: none;
    }
  }
  .nav {
    align-self: flex-end;

    .list {
      justify-content: space-around;
      align-items: center;
      .nav-item {
        padding: 0;
        margin: 0em;
        &__text {
          display: none;
        }

        &__icon {
          display: block;
          width: 24px;
          height: 24px;

          &_big {
            width: 32px;
            height: 32px;
          }
        }
      }
    }
  }
}
</style>

<template>
  <header class="header">
    <div class="top">
      <img src="@/assets/logo-text.png" alt="logo" class="logo" />
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
          :key="item"
          @click="$refs.headBox.alert('Sorry, still in development')"
        >
          {{ item }}
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
      navItems: ["Home", "Profile", "Messages", "Friends", "Communities", "Map", "Eco projects"]
    };
  },
  methods: {
    alertTopBox() {
      this.$refs.topBox.alert("Sorry, still in development");
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

.top {
  height: 72px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin-left: 20%;
  width: 60%;

  .logo {
    max-height: 80%;
  }

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
      font-size: 1.2rem;
      color: $grayText;

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
</style>

<template>
  <header class="header">
    <div class="top">
      <img src="@/assets/logo-text.png" alt="logo" class="logo" />
      <header-search></header-search>
      <div class="account-wrapper">
        <img src="@/assets/profile.svg" alt="profile-image" />
        <span v-if="user">{{ user.name }}</span>
        <span v-else>User</span>
      </div>
      <img src="@/assets/notification.svg" alt="notification" class="notification" />
      <img src="@/assets/gear.svg" alt="configs" class="configs" />
    </div>
    <nav class="nav"></nav>
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
      return this.$store.state.user;
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";
@import "../../../scss/_base.scss";

.header {
  background-color: $blackBackground;
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
}
</style>

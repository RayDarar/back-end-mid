<template>
  <section id="admin-panel">
    <nav class="tab-headers">
      <router-link class="header-item" to="/admin-panel/users">Users</router-link>
      <router-link class="header-item" to="/admin-panel/stats">Stats</router-link>
    </nav>
    <router-view class="tab"></router-view>
  </section>
</template>

<script>
export default {
  name: "AdminPanel",
  created() {
    document.title = "EcoBeko | Admin Panel";
  },
};
</script>

<style lang="scss" scoped>
#admin-panel {
  height: 100vh;
  overflow-y: auto;
}

.tab-headers {
  display: flex;
  margin: 2em;
  box-shadow: 0px 0px 10px 10px rgba($color: black, $alpha: 0.03);
  border-radius: 10px;
  height: 80px;
  align-items: center;
  padding: 0em 3em;
}

.header-item {
  font-size: 1.5rem;
  margin: 1em;
  text-decoration: none;
  color: black;

  &.router-link-active {
    text-decoration: underline;
  }
}

.tab {
  margin: 2em;
  box-shadow: 0px 0px 10px 10px rgba($color: black, $alpha: 0.03);
  border-radius: 10px;
  padding: 2em 3em;
}
</style>

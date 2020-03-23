<template>
  <section id="home-page"></section>
</template>

<script>
export default {
  name: "HomePage",
  created() {
    if (!this.$store.getters.getToken) {
      this.$router.push("/welcome/sign-in");
    }
    document.title = "Eco Beko | Home";
  }
};
</script>

<style lang="scss" scoped></style>

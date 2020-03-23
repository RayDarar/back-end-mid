<template>
  <section id="home-page"></section>
</template>

<script>
export default {
  name: "HomePage",
  created() {
    if (!this.$store.getters.getToken) {
      this.$router.push("/welcome");
    }

    document.title = "Eco Beko | Home";
  },
  components: {}
};
</script>

<style lang="scss"></style>

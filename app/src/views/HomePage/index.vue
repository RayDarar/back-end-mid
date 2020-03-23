<template>
  <section id="home-page">
    <home-page-header class="header"></home-page-header>
    <div class="content">
      <home-page-news></home-page-news>
      <home-page-stats></home-page-stats>
      <home-page-suggestions></home-page-suggestions>
    </div>
  </section>
</template>

<script>
import HomePageHeader from "./HomePageHeader/index";
import HomePageNews from "./HomePageNews";
import HomePageStats from "./HomePageStats";
import HomePageSuggestions from "./HomePageSuggestions";

export default {
  name: "HomePage",
  created() {
    if (!this.$store.getters.getToken) {
      this.$router.push("/welcome");
    }

    document.title = "Eco Beko | Home";
  },
  components: {
    HomePageHeader,
    HomePageNews,
    HomePageStats,
    HomePageSuggestions
  }
};
</script>

<style lang="scss" scoped>
#home-page {
  height: 100%;
  background-image: url("../../assets/home-page-background.png");
  background-size: cover;
  display: flex;
  flex-direction: column;
}

.content {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  width: 60%;
  margin-left: 20%;
  height: 100%;
  gap: 30px;
}
</style>

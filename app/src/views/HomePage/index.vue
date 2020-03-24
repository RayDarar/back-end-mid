<template>
  <section id="home-page">
    <home-page-header class="header"></home-page-header>
    <div class="content">
      <home-page-news class="news"></home-page-news>
      <home-page-stats class="stats"></home-page-stats>
      <home-page-suggestions class="suggestions"></home-page-suggestions>
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
@import "../../scss/_globals.scss";
@import "../../scss/_base.scss";

#home-page {
  height: 100%;
  background-image: url("../../assets/home-page-background.png");
  background-size: cover;
  display: flex;
  flex-direction: column;
  overflow-y: auto;
}

.content {
  margin-top: 30px + 72px + 72px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  width: 60%;
  margin-left: 20%;
  height: 100%;
  gap: 30px;
}

.news {
  @include pos(1, 1, 3, 3);
}

.stats {
  @include pos(3, 1);
}

.suggestions {
  @include pos(3, 2);
}

@media screen and (max-width: 1440px) {
  .content {
    width: 80%;
    margin-left: 10%;
  }
}

@media screen and (max-width: 840px) {
  .content {
    width: 90%;
    margin-left: 5%;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 0.3fr 1fr;
  }

  .news {
    @include pos(1, 2, 3, 2);
  }

  .stats {
    @include pos(1, 1);
  }

  .suggestions {
    @include pos(2, 1);
  }
}

@media screen and (max-width: 450px) {
  .content {
    width: 96%;
    margin-left: 2%;
    grid-template-columns: 1fr;
    grid-template-rows: 0.3fr 0.3fr 1fr;
  }

  .news {
    @include pos(1, 3);
  }

  .stats {
    @include pos(1, 1);
  }

  .suggestions {
    @include pos(1, 2);
  }
}


</style>

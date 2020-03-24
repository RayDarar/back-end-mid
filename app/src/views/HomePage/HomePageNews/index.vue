<template>
  <section class="news">
    <news-header class="header"></news-header>
    <news-item class="item"></news-item>
    <news-item class="item"></news-item>
  </section>
</template>

<script>
import NewsHeader from "./NewsHeader";
import NewsItem from "./NewsItem";

export default {
  name: "HomePageNews",
  components: {
    NewsHeader,
    NewsItem
  }
};

</script>
<style lang="scss" scoped>
.news {
  height: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 0.15fr auto;
  gap: 30px;
}

.header,
.item {
  grid-column: 1 / 4;
}
</style>

<template>
  <section class="news">
    <news-header></news-header>
  </section>
</template>

<script>
import NewsHeader from "./NewsHeader";

export default {
  name: "HomePageNews",
  components: {
    NewsHeader
  }
};
</script>

<style lang="scss" scoped>
.news {
  height: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 30px;
}
</style>

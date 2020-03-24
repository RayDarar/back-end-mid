<template>
  <article class="news-item">
    <img :src="getImage(author.image)" alt="author-image" class="author-image" />
    <div class="content">
      <header class="heading"></header>
      <img :src="getImage(post.image)" alt="post-image" class="post-image" />
      <h3 class="post-title">
        {{ post.title }}
      </h3>
      <p class="post-text">
        {{ post.text }}
      </p>
      <div class="post-items-wrapper">
        <icon-text></icon-text>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  name: "NewsItem",
  props: {
    author: Object,
    post: Object
  },
  methods: {
    getImage(image) {
      const images = require.context("@/assets/", false, /\.png$/);
      return images("./" + image);
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";
@import "../../../scss/_base.scss";

.news-item {
  display: flex;
  flex-direction: row;
}
</style>

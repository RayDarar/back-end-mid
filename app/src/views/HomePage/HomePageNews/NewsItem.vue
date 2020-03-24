<template>
  <article class="news-item" @click="$refs.box.alert('Sorry, still in development')">
    <alert-box :time="1500" ref="box"></alert-box>
    <img :src="getImage(post.authorImage)" alt="author-image" class="author-image" />
    <div class="content">
      <header class="heading">
        <div class="author-wrapper">
          <span class="author">{{ post.authorName }}</span>
          <span>shared</span>
        </div>
        <div class="status-wrapper">
          <span>{{ post.authorStatus }}</span>
          <span class="time">{{ fixedTime }}</span>
        </div>
      </header>
      <div class="post-image">
        <img :src="getImage(post.image)" alt="post-image" />
      </div>
      <h3 class="post-title">
        {{ post.title }}
      </h3>
      <p class="post-text">
        {{ fixedText }}
        <button class="more">Show more</button>
      </p>
      <div class="post-items-wrapper">
        <icon-text image="like.svg" size="16px">
          {{ post.likes }}
        </icon-text>
        <icon-text image="comment.svg" size="16px">
          {{ post.comments }}
        </icon-text>
        <icon-text image="repost.svg" size="16px">
          {{ post.reposts }}
        </icon-text>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  name: "NewsItem",
  props: {
    post: Object
  },
  methods: {
    getImage(image) {
      const images = require.context("@/assets/", false, /[\.png\.gif]$/);
      return images("./" + image);
    }
  },
  computed: {
    fixedTime() {
      return this.post.time.toLocaleString();
    },
    fixedText() {
      if (this.post.text.length > 200) return this.post.text.substr(0, 200) + "...";
      return this.post.text;
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";
@import "../../../scss/_base.scss";

.row {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.news-item {
  @extend .row;
  align-items: flex-start;
  position: relative;

  .author-image {
    width: 60px;
    margin-right: 1em;
  }

  .content {
    background-color: white;
    border-radius: 10px;
    display: grid;
    grid-template-columns: 1fr 2fr;
    grid-template-rows: 0.1fr 0.2fr 0.5fr 0.1fr;
    gap: 20px;

    .heading {
      @include pos(1, 1, 3, 1);
      @extend .row;
      justify-content: space-between;
      border-bottom: 2px solid lightgray;
      padding: 1em;

      .author-wrapper,
      .status-wrapper {
        @extend .row;

        .author {
          margin-right: 1em;
          font-size: 1.1rem;
          color: $accentBlue;
        }

        .time {
          color: $grayText;
          margin-left: 1em;
        }
      }
    }

    .post-image {
      @include pos(1, 2, 1, 4);
      margin: 0.5em 1em;

      width: 100%;
      height: 100%;
      overflow: hidden;
      img {
        width: 100%;
        height: 100%;
        object-fit: fit;
      }
      border-radius: 5px;
    }

    .post-title {
      @include pos(2, 2);
      font-size: 1.2rem;
      margin: 0.5em 1em;
    }

    .post-text {
      @include pos(2, 3);
      font-size: 1rem;
      margin: 0em 1em;

      .more {
        margin: 1em 0em;
        display: block;
        color: $accentBlue;
        background-color: transparent;
        opacity: 0.8;
        transition: opacity 0.3s;
        cursor: pointer;
        font-size: 1.1rem;

        &:hover {
          opacity: 1;
        }
      }
    }

    .post-items-wrapper {
      @include pos(1, 4, 3, 4);
      @extend .row;
      justify-content: flex-end;
      color: $grayText;

      *:hover {
        cursor: pointer;
        color: black;
        transition: color 0.3s;
      }
    }
  }
}
@media screen and (max-width: 450px) {
  .news-item {
    .author-image {
      display: none;
    }

    .content {
      grid-template-columns: 1fr;
      grid-template-rows: 0.1fr 1fr 0.2fr 0.4fr 0.1fr;

      .heading {
        @include pos(1, 1, 3, 1);
        flex-direction: column;
        align-items: flex-start;

        .author-wrapper,
        .status-wrapper {
          .author {
            margin-right: 1em;
            font-size: 1rem;
          }

          .time {
            color: $grayText;
            margin-left: 1em;
            font-size: 0.8rem;
            margin-top: 0.1em;
          }
        }

        .status-wrapper {
          margin-top: 0.5em;
        }
      }

      .post-image {
        @include pos(1, 2);
      }

      .post-title {
        @include pos(1, 3);
      }

      .post-text {
        @include pos(1, 4);
      }

      .post-items-wrapper {
        @include pos(1, 5);
      }
    }
  }
}
</style>

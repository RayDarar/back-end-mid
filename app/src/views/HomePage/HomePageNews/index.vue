<template>
  <section class="news">
    <news-header class="header"></news-header>
    <transition-group
      :css="false"
      @before-enter="beforeEnter"
      @enter="enter"
      @leave="leave"
      name="staggered-fade"
      class="item-wrapper"
    >
      <news-item
        v-for="(post, index) in filteredPosts"
        :key="post.title"
        :post="post"
        class="item"
        :data-index="index"
      ></news-item>
    </transition-group>
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
  },
  data() {
    return {
      posts: [
        {
          authorImage: "alina.png",
          authorName: "Alina Danaeva",
          authorStatus: "Follow",
          time: new Date(),
          image: "welcome.gif",
          title: "Welcome To Eco Beko!",
          text: `Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ipsa reprehenderit molestias quam magni. Dolore odio rerum itaque deleniti error corrupti voluptates laudantium nostrum incidunt, ipsa animi minus. Est, soluta, incidunt aperiam ullam odio minima repellat unde eveniet, dolores consequuntur quas iusto ducimus omnis provident? Tempora nemo asperiores ut qui.`,
          likes: 340,
          comments: 0,
          reposts: 3
        },
        {
          authorImage: "alina.png",
          authorName: "Alina Danaeva",
          authorStatus: "Follow",
          time: new Date(Date.now() - 8640000),
          image: "welcome.gif",
          title: "Our goals",
          text: `Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ipsa reprehenderit molestias quam magni. Dolore odio rerum itaque deleniti error corrupti voluptates laudantium nostrum incidunt, ipsa animi minus. Est, soluta, incidunt aperiam ullam odio minima repellat unde eveniet, dolores consequuntur quas iusto ducimus omnis provident? Tempora nemo asperiores ut qui.`,
          likes: 140,
          comments: 0,
          reposts: 2
        },
        {
          authorImage: "alina.png",
          authorName: "Alina Danaeva",
          authorStatus: "Follow",
          time: new Date(Date.now() - 8640000 - 8640000),
          image: "welcome.gif",
          title: "What you can do",
          text: `Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ipsa reprehenderit molestias quam magni. Dolore odio rerum itaque deleniti error corrupti voluptates laudantium nostrum incidunt, ipsa animi minus. Est, soluta, incidunt aperiam ullam odio minima repellat unde eveniet, dolores consequuntur quas iusto ducimus omnis provident? Tempora nemo asperiores ut qui.`,
          likes: 543,
          comments: 0,
          reposts: 17
        }
      ]
    };
  },
  computed: {
    filteredPosts() {
      return this.posts.filter(item => {
        return item.title.toLowerCase().indexOf(this.query.toLowerCase()) !== -1;
      });
    },
    query() {
      return this.$store.state.news.search;
    }
  },
  methods: {
    beforeEnter(el) {
      el.style.opacity = 0;
      el.style.transform = "scale(0)";
    },
    enter(el, done) {
      const delay = el.dataset.index * 150;
      setTimeout(() => {
        Velocity(el, { opacity: 1, transform: "scale(1)" }, { complete: done });
      }, delay);
    },
    leave(el, done) {
      const delay = el.dataset.index * 150;
      setTimeout(() => {
        Velocity(el, { opacity: 0, transform: "scale(0)" }, { complete: done });
      }, delay);
    }
  }
};
</script>
<style lang="scss" scoped>
.news {
  height: 100%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 0.085fr auto;
  gap: 30px;
}

.header,
.item-wrapper {
  grid-column: 1 / 4;
}

.item {
  margin-bottom: 30px;
  transition: all 0.3s;
}
</style>

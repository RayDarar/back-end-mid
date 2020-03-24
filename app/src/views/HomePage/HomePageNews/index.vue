<template>
  <section class="news">
    <news-header class="header"></news-header>
    <news-item class="item" :post="post"></news-item>
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
      post: {
        authorImage: "alina.png",
        authorName: "Alina Danaeva",
        authorStatus: "Follow",
        time: new Date(),
        image: "welcome.gif",
        title: "Welcome To Eco Beko!",
        text: `Lorem, ipsum dolor sit amet consectetur adipisicing elit. Architecto ipsa reprehenderit
    molestias quam magni. Dolore odio rerum itaque deleniti error corrupti voluptates laudantium
    nostrum incidunt, ipsa animi minus. Est, soluta, incidunt aperiam ullam odio minima repellat
    unde eveniet, dolores consequuntur quas iusto ducimus omnis provident? Tempora nemo asperiores
    ut qui.`,
        likes: 340,
        comments: 0,
        reposts: 0
      }
    };
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
.item {
  grid-column: 1 / 4;
}
</style>

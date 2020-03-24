<template>
  <div class="stat-item">
    <img :src="getImage(image)" :alt="text" class="image" />
    <span class="text">{{ text }}</span>
    <span class="data">{{ fixedData }}</span>
  </div>
</template>

<script>
export default {
  name: "StatItem",
  props: {
    image: String,
    text: String,
    data: Number
  },
  methods: {
    getImage(image) {
      const images = require.context("@/assets/", false, /\.svg$/);
      return images("./" + image);
    }
  },
  computed: {
    fixedData() {
      let fixed = this.data.toFixed(2);
      if (fixed.length <= 6) return fixed;
      fixed = +fixed;
      return (fixed / 1000).toFixed(2) + "K";
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";

.stat-item {
  padding: 1em;
  display: flex;
  align-items: center;

  .text {
    margin: 1em;
  }

  .data {
    margin-left: auto;
    margin-right: 1em;
    font-size: 1.2rem;
    color: $accentBlue;
    font-weight: bold;
  }
}
</style>

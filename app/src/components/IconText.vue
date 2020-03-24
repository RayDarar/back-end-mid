<template>
  <div class="icon-text">
    <img :style="{ width: size }" class="image" :src="getImage(image)" :alt="image" />
    <span class="text"> <slot /> </span>
  </div>
</template>

<script>
export default {
  name: "IconText",
  props: {
    image: String,
    size: {
      type: String,
      default: "24px"
    }
  },
  methods: {
    getImage(image) {
      const images = require.context("@/assets/", false, /[\.png\.svg]$/);
      return images("./" + image);
    }
  }
};
</script>

<style lang="scss" scoped>
.icon-text {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
}
.text {
  margin: 1em;
}
</style>

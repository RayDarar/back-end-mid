<template>
  <transition name="slide-left">
    <div v-if="show" class="alert-box"><slot class="text" /></div>
  </transition>
</template>

<script>
export default {
  name: "AlertBox",
  props: {
    time: {
      type: Number,
      default: 1000
    }
  },
  methods: {
    alert() {
      this.show = true;
      setTimeout(() => {
        this.show = false;
      }, this.time);
    }
  },
  data() {
    return {
      show: false
    };
  }
};
</script>

<style lang="scss" scoped>
@import "../scss/_base.scss";

.alert-box {
  width: 240px;
  border-radius: 15px;
  background-color: rgba($color: darkred, $alpha: 0.7);
  padding: 0.5em 1em;
  position: absolute;
  top: 0;
}

.text {
  color: white;
  font-size: 1.2rem;
}
</style>

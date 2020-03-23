<template>
  <transition name="slide-left">
    <div v-if="show" class="alert-box">
      <span class="text">
        {{ message }}
      </span>
    </div>
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
    alert(message="Something went wrong...") {
      this.message = message;
      this.show = true;
      setTimeout(() => {
        this.show = false;
      }, this.time);
    }
  },
  data() {
    return {
      show: false,
      message: ""
    };
  }
};
</script>

<style lang="scss" scoped>
@import "../scss/_globals.scss";
@import "../scss/_base.scss";

.alert-box {
  width: 300px;
  border-radius: 15px;
  background-color: rgba($color: darkred, $alpha: 0.7);
  padding: 1em 1.5em;
  position: absolute;
  top: 0;
}

.text {
  color: white;
  font-size: 1.2rem;
}
</style>

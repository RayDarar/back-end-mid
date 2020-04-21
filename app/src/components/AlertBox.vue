<template>
  <transition name="slide-left">
    <div
      v-show="show"
      class="alert-box"
      :class="{
        'alert-box_error': error,
        'alert-box_good': !error,
      }"
    >
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
      default: 1000,
    },
  },
  methods: {
    alert(message = "Something went wrong...", error = true) {
      this.message = message;
      this.show = true;
      this.error = error;
      setTimeout(() => {
        this.show = false;
      }, this.time);
    },
  },
  data() {
    return {
      show: false,
      message: "",
      error: true,
    };
  },
};
</script>

<style lang="scss" scoped>
@import "../scss/_globals.scss";
@import "../scss/_base.scss";

.alert-box {
  width: 300px;
  border-radius: 15px;
  border: none;
  padding: 1em 1.5em;
  position: absolute;
  top: 0;
}

.alert-box_error {
  background-color: rgba($color: darkred, $alpha: 0.7);
}

.alert-box_good {
  background-color: rgba($color: darkgreen, $alpha: 0.7);
}

.text {
  color: white;
  font-size: 1.2rem;
}
</style>

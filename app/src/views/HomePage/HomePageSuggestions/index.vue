<template>
  <section class="suggestions" @click="alertBox">
    <alert-box ref="box" :time="1500"></alert-box>
    <h2 class="title">People you may know</h2>
    <sug-item fullname="Alina Danaeva" image="alina.png"></sug-item>
  </section>
</template>

<script>
import SugItem from "./SugItem";

export default {
  name: "HomePageSuggestions",
  components: {
    SugItem
  },
  methods: {
    alertBox() {
      this.$refs.box.alert("Sorry, still in development");
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";

.suggestions {
  background-color: white;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  position: relative;

  display: flex;
  flex-direction: column;
  align-items: center;

  .title {
    margin: 1em;
    font-size: 1.1rem;
    color: $grayText;
  }
}
</style>

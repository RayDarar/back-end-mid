<template>
  <header class="header" @click="$refs.box.alert(`Sorry, that's wont't work for now`)">
    <alert-box :time="2000" ref="box"></alert-box>
    <div class="item border-right">
      <img src="@/assets/share.svg" alt="share-icon" />
      <span>Share an update</span>
    </div>
    <div class="item">
      <img src="@/assets/image.svg" alt="image-icon" />
      <span>Upload a photo</span>
    </div>
    <div class="item border-left">
      <img src="@/assets/pen.svg" alt="share-icon" />
      <span>Write an article</span>
    </div>
  </header>
</template>

<script>
import AlertBox from "@/components/AlertBox";

export default {
  name: "NewsHeader",
  components: {
    AlertBox
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";

.header {
  background-color: white;
  height: 100%;
  border-radius: 10px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  position: relative;
}
.item {
  display: flex;
  flex-direction: row;
  align-items: center;
  height: 100%;
  width: 100%;
  justify-content: center;
  cursor: pointer;

  span {
    color: $grayText;
    font-size: 1.1rem;
    margin: 1em;
    transition: color 0.3s;
  }

  &:hover span {
    color: black;
  }
}

.border-right {
  border-right: 2px solid lightgray;
}
.border-left {
  border-left: 2px solid lightgray;
}
</style>

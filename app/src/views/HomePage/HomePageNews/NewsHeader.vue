<template>
  <header class="header" @click="$refs.box.alert(`Sorry, that's wont't work for now`)">
    <alert-box :time="2000" ref="box"></alert-box>
    <icon-text image="share.svg" size="22px" class="item border-right">
      Share an update
    </icon-text>
    <icon-text image="image.svg" size="22px" class="item">
      Upload a photo
    </icon-text>
    <icon-text image="pen.svg" size="22px" class="item border-left">
      Write an article
    </icon-text>
  </header>
</template>

<script>
export default {
  name: "NewsHeader",
  components: {},
  computed: {}
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
  cursor: pointer;
  color: $grayText;
  font-size: 1.1rem;
  transition: color 0.3s;

  &:hover {
    color: black;
  }
}

.border-right {
  border-right: 2px solid lightgray;
}
.border-left {
  border-left: 2px solid lightgray;
}

@media screen and (max-width: 450px) {
  .header {
    display: none;
  }
}
</style>

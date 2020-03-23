<template>
  <div class="search">    
    <input type="text" placeholder="Search" class="input-field" />
  </div>
</template>

<script>
export default {
  name: "HeaderSearch",
  components: {}
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";
@import "../../../scss/_base.scss";

.search {
  height: 50%;
  width: 30%;
}
.input-field {
  padding: 0.3em 0.5em;
  padding-left: 1em;
  border: 5px solid $accentBlue;
  border-radius: 15px;
  width: 100%;
}
</style>

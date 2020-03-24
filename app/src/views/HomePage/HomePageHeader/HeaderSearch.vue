<template>
  <div class="search">
    <input
      @change="search"
      type="text"
      placeholder="Search by title"
      class="input-field"
      v-model="query"
    />
  </div>
</template>

<script>
export default {
  name: "HeaderSearch",
  components: {},
  methods: {
    search() {
      this.$store.commit("newQuery", this.query);
    }
  },
  data() {
    return {
      query: ""
    };
  }
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

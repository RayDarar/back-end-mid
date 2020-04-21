<template>
  <div id="admin-stats">
    <alert-box class="alert-box" :time="2000" ref="box"></alert-box>

    <div class="button-wrapper">
      <button class="button" @click="triggerCount">Calculate number of users</button>
      <button class="button" @click="triggerMatrix">Gen matrix from user's phone numbers</button>
    </div>
    <pre class="output">
<code class="javascript">
  {{ outputCode }}
</code>
</pre>
  </div>
</template>

<script>
import api from "@/api";

export default {
  name: "AdminStats",
  data() {
    return {
      output: {},
    };
  },
  computed: {
    outputCode() {
      return JSON.stringify(this.output, null, 2);
    },
  },
  methods: {
    async triggerCount() {
      this.output = (await api.countUsers()).data;
      this.$refs.box.alert("Loops used", false);
    },
    async triggerMatrix() {
      this.output = (await api.generateMatrix()).data;
      this.$refs.box.alert("Matrices used", false);
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../../scss/_globals.scss";
@import "../../scss/_base.scss";

#admin-stats {
  position: relative;
}

.button-wrapper {
  display: flex;
  justify-content: space-between;
  width: 60%;
}

.button {
  background-color: $accentBlue;
}

.output {
  margin-top: 1em;
}

.alert-box {
  z-index: 3;
  top: -20%;
  position: absolute;
}
</style>

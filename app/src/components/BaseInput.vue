<template>
  <div>
    <transition name="slide-left">
      <p v-if="error" class="error-text">
        {{ errorText }}
      </p>
    </transition>
    <input
      :type="type"
      :value="value"
      @input="$emit('input', $event.target.value)"
      :placeholder="text"
      @focus="$emit('update:error', false)"
    />
  </div>
</template>

<script>
export default {
  name: "BaseInput",
  data() {
    return {
      value: ""
    };
  },
  methods: {},
  props: {
    type: {
      type: String,
      default: "text"
    },
    text: String,
    error: Boolean,
    "error-text": {
      type: String,
      default: "Correct the field"
    }
  },
  inheritAttrs: false,
  watch: {
    $attrs(newAttrs, oldAttrs) {
      this.value = newAttrs.value;
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../scss/_globals.scss";
@import "../scss/_base.scss";

input {
  border: 0.5em solid rgba($color: $accentBlue, $alpha: 0.9);
  border-radius: 10px;
  padding: 0.5em 1.2em;
  width: 100%;
}

.error-text {
  margin-bottom: 0.5em;
  color: darkred;
  transition: all 0.3s;
}
</style>

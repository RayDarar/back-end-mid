<template>
  <label>
    <transition name="slide-left">
      <p v-if="error" class="error-text">
        {{ errorText }}
      </p>
    </transition>
    <input type="radio" :value="val" :name="group" @change="$emit('change', val)" />
    {{ label }}
  </label>
</template>

<script>
export default {
  model: {
    event: "change",
    prop: "checked"
  },
  name: "BaseRadio",
  data() {
    return {};
  },
  props: {
    label: String,
    val: String,
    group: String,
    error: Boolean,
    "error-text": {
      type: String,
      default: "Check it"
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../scss/_globals.scss";
@import "../scss/_base.scss";

input {
  z-index: 1;
  position: relative;
  margin-right: 0.5em;
  cursor: pointer;
}

input::before,
input::after {
  content: "";
  position: absolute;
  border-radius: 50%;
}
input::before {
  width: 100%;
  height: 100%;
  left: 0;
  top: -1px;
  background-color: white;
  border: 2px solid $accentBlue;
}
input::after {
  background-color: $accentBlue;
  left: calc(15% + 2px);
  top: calc(15% + 1px);
  width: 70%;
  height: 70%;
  border-radius: 50%;
  transition: transform 0.3s;
  transform: scale(0);
}

input:checked::after {
  transform: scale(1);
}

label {
  position: relative;
}

.error-text {
  margin-bottom: 0.5em;
  color: darkred;
  transition: all 0.3s;
  position: absolute;
  right: -100px;
}

</style>

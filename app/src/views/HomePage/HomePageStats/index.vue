<template>
  <section class="stats">
    <h2 class="title">Recycling Statistics</h2>
    <stat-item image="tree.svg" text="Saved Trees" :data="0.0" class="stat-item"></stat-item>
    <stat-item
      image="power.svg"
      text="Energy Saved (kWH)"
      :data="0.0"
      class="stat-item"
    ></stat-item>
    <stat-item
      image="recy.svg"
      text="Recycled Waste (kg)"
      :data="0.0"
      class="stat-item"
    ></stat-item>
    <button class="button">Join</button>
  </section>
</template>

<script>
import StatItem from "./StatItem";

export default {
  name: "HomePageStats",
  components: {
    StatItem
  }
};
</script>

<style lang="scss" scoped>
@import "../../../scss/_globals.scss";
@import "../../../scss/_base.scss";

.stats {
  background-color: white;
  width: 100%;
  height: 100%;
  border-radius: 10px;

  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;

  .title {
    margin: 1em;
    font-size: 1.1rem;
    color: $grayText;
  }

  .stat-item {
    width: 100%;
  }

  .button {
    background-color: $accentBlue;
    margin: 1em;
  }
}
</style>

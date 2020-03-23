<template>
  <section class="stats">
    <alert-box :time="2000" ref="box"></alert-box>
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
    <button class="button" @click="$refs.box.alert('Sorry, still in development')">Join</button>
  </section>
</template>

<script>
import StatItem from "./StatItem";
import AlertBox from "@/components/AlertBox";

export default {
  name: "HomePageStats",
  components: {
    StatItem,
    AlertBox
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
  position: relative;

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

<template>
  <section class="stats">
    <alert-box :time="2000" ref="box"></alert-box>
    <h2 class="title">Recycling Statistics</h2>
    <stat-item
      image="tree.svg"
      text="Saved Trees"
      :data="stats[0].initial"
      class="stat-item"
    ></stat-item>
    <stat-item
      image="power.svg"
      text="Energy Saved (kWH)"
      :data="stats[1].initial"
      class="stat-item"
    ></stat-item>
    <stat-item
      image="recy.svg"
      text="Recycled Waste (kg)"
      :data="stats[2].initial"
      class="stat-item"
    ></stat-item>
    <button class="button" @click="$refs.box.alert('Sorry, still in development')">Join</button>
  </section>
</template>

<script>
import StatItem from "./StatItem";

function genFixed() {
  return +(Math.random() * 10).toFixed(2);
}

export default {
  name: "HomePageStats",
  components: {
    StatItem
  },
  data() {
    return {
      stats: [
        {
          initial: 0.0,
          interval: 0
        },
        {
          initial: 0.0,
          interval: 0
        },
        {
          initial: 0.0,
          interval: 0
        }
      ]
    };
  },
  created() {
    for (const stat of this.stats) {
      stat.interval = Math.round(genFixed()) * 1000;
      stat.initial = genFixed();

      stat.id = setInterval(() => {
        stat.initial += genFixed();
      }, stat.interval);
    }
  },
  beforeDestroy() {
    for (const stat of this.stats) clearInterval(stat.id);
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

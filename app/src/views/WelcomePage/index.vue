<template>
  <section id="welcome">
    <article class="content">
      <welcome-header></welcome-header>
      <p class="title">
        Be smart <br />
        Be eco-friendly
      </p>
      <p class="text">
        We are with eco-future and you can be with us. <br />
        We are a group of people who cares. <br />
        Exciting future, lots of possibilities.
      </p>
      <button class="sign-up button" @click="$router.push('/welcome/sign-up')">Sign Up</button>
      <button class="sign-in button" @click="$router.push('/welcome/sign-in')">Sign In</button>
      <div class="polona-wrapper">
        <img src="@/assets/polona.png" alt="polona-image" class="polona" />
        <img src="@/assets/welcome.gif" alt="plastic-in-ocean" class="plastic" />
      </div>
    </article>
  </section>
</template>

<script>
import Header from "./Header";

export default {
  name: "WelcomePage",
  components: {
    "welcome-header": Header
  },
  created() {
    if (this.$store.getters.getToken) {
      this.$router.push("/");
    }
    document.title = "EcoBeko | Welcome";
  }
};
</script>

<style lang="scss" scoped>
@import "../../scss/_globals.scss";
@import "../../scss/_base.scss";

#welcome {
  height: 100%;
  background-image: url("../../assets/background.png");
  background-repeat: no-repeat;
  background-size: cover;
}

.content {
  padding: 0.5em;
  display: grid;
  grid-template-columns: 0.5fr 1fr 1fr 1fr;
  grid-template-rows: 72px 0.8fr 0.8fr 0.5fr 1fr;
  grid-column-gap: 1em;
  margin-left: 20%;
  width: 60%;
  height: 100%;

  .title {
    @include pos(1, 3, 4, 4);
    font-family: GilroyBold;
    font-size: 4.5rem;
    max-width: 100%;
    color: white;
  }

  .text {
    font-family: Montserrat;
    @include pos(1, 4, 4, 5);
    max-width: 100%;
    color: white;
    font-size: 1.4rem;
  }

  .sign-up,
  .sign-in {
    @include pos(1, 5);
    align-self: flex-start;
    justify-self: flex-start;
  }

  .sign-up {
    background-color: $accentBlue;
    white-space: nowrap;
  }

  .sign-in {
    background-color: transparent;
    position: relative;
    @include pos(2, 5);
    white-space: nowrap;

    &:before {
      content: "";
      position: absolute;
      width: 65%;
      background-color: white;
      bottom: 0;
      left: 20%;
      height: 2px;
    }
  }

  .polona-wrapper {
    @include pos(4, 3, 5, 4);
    position: relative;

    .polona {
      $margin: -20%;
      position: absolute;
      left: $margin;
      top: $margin;
      max-width: 220%;
    }

    .plastic {
      position: absolute;
      max-width: 100%;
      bottom: -110%;
      left: -60%;
    }
  }
}

@media screen and (max-width: 1440px) {
  .content {
    margin-left: 10%;
    width: 80%;
  }
}
@media screen and (max-width: 840px) {
  .content {
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 0.3fr 1fr 0.8fr 0.5fr 1fr;

    .title {
      font-size: 5rem;
    }

    .text {
      font-size: 1.6rem;
    }

    .sign-in,
    .sign-up {
      font-size: 1.3rem;
    }

    .polona-wrapper {
      @include pos(3, 2);

      .polona {
        $margin: 5%;
        left: $margin;
        top: $margin;
        max-width: 200%;
      }

      .plastic {
        max-width: 100%;
        bottom: 10%;
        left: -80%;
      }
    }
  }
}
</style>

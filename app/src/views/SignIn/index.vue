<template>
  <section id="sign-in">
    <h2 class="title">Sign In</h2>
    <form class="form" @submit.prevent="signIn">
      <alert-box :time="1500" class="alert" ref="box"></alert-box>
      <h3>Login to your account</h3>
      <base-input
        text="Phone Number"
        v-model="form.phone.value"
        :error.sync="form.phone.error"
        error-text="Follow the pattern (+7xxxxxxxxxx)"
        class="form-input"
      ></base-input>
      <base-input
        type="password"
        text="Password"
        v-model="form.password.value"
        :error.sync="form.password.error"
        error-text="Minimum eight characters"
        class="form-input"
      ></base-input>
      <input type="submit" class="button sign-up" />
    </form>
    <p class="redir">
      Don't have an account?
      <span class="redir__link" @click="$router.push('/welcome/sign-up')">Sign Up</span>
    </p>
  </section>
</template>

<script>
import api from "../../api";
import BaseInput from "@/components/BaseInput";
import BaseRadio from "@/components/BaseRadio";
import AlertBox from "@/components/AlertBox";

export default {
  name: "SignIn",
  created() {
    document.title = "EcoBeko | Sign In";
  },
  components: {
    BaseInput,
    BaseRadio,
    AlertBox
  },
  data() {
    return {
      form: {
        password: {
          value: "",
          error: false,
          pattern: /(?=.{8,})/i
        },
        phone: {
          value: "+7",
          error: false,
          pattern: /^([\+7])([0-9]+){10}/i
        }
      }
    };
  },
  methods: {
    async signIn() {
      const { phone, password } = this.form;
      phone.error = !phone.pattern.test(phone.value);
      password.error = !password.pattern.test(password.value);

      if (!phone.error && !password.error) {
        const user = await api.validate(phone.value, password.value);
        if (user.data.err) {
          this.$refs.box.alert(user.data.err);
        } else {
          this.$store.commit("setToken", phone.value);
          this.$store.commit("setUser", user);

          this.$router.push("/");
        }
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../scss/_globals.scss";
@import "../../scss/_base.scss";

#sign-in {
  height: 100%;
  background-image: url("../../assets/background-sign-in.png");
  background-size: cover;
  background-repeat: no-repeat;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 0.2fr 1fr 1fr 1fr 0.1fr;
  justify-items: center;
  align-items: flex-end;
}

.title {
  align-self: flex-end;
  @include pos(2, 2);
  font-family: GilroyLight;
  font-size: 2rem;
  color: $grayText;
  border-bottom: 1px solid $grayText;
}

.form {
  @include pos(2, 3);
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  height: 100%;
  padding: 1em;
  position: relative;

  h3 {
    align-self: center;
    color: $grayText;
    margin: 1em;
  }

  .form-input {
    width: 80%;
    margin: 0.5em;
  }

  .gender-wrapper {
    display: flex;
    width: 70%;
    justify-content: space-between;
    margin: 1em;
  }

  .sign-up {
    background-color: $accentBlue;
    margin-top: 1em;
  }

  .policy {
    margin: 0.5em;
    width: 75%;
    font-size: 0.9rem;
  }
}

.redir {
  @include pos(2, 4);
  margin: 1em;
  align-self: flex-start;
  color: $grayText;
  font-size: 1.2rem;

  &__link {
    font-size: inherit;
    color: $accentBlue;
    cursor: pointer;
  }
}
</style>

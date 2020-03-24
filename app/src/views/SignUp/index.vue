<template>
  <section id="sign-up">
    <h2 class="title">Sign Up</h2>
    <form class="form" @submit.prevent="signUp">
      <alert-box :time="1500" class="alert" ref="box"></alert-box>
      <h3>Create a new account</h3>
      <base-input
        text="First Name"
        v-model="form.name.value"
        :error.sync="form.name.error"
        error-text="Enter correct name"
        class="form-input"
      ></base-input>
      <base-input
        text="Last Name"
        v-model="form.surname.value"
        :error.sync="form.surname.error"
        error-text="Enter correct surname"
        class="form-input"
      ></base-input>
      <base-input
        text="Phone Number"
        v-model="form.phone.value"
        :error.sync="form.phone.error"
        error-text="Follow the pattern (+7xxxxxxxxxx)"
        class="form-input"
      ></base-input>
      <div class="gender-wrapper">
        <span>Gender:</span>
        <base-radio label="Male" val="male" group="gender" v-model="form.gender.value"></base-radio>
        <base-radio
          label="Female"
          val="female"
          group="gender"
          v-model="form.gender.value"
          :error="form.gender.error"
        ></base-radio>
      </div>
      <base-input
        type="date"
        text="Date Of Birth"
        v-model="form.birthday.value"
        :error="form.birthday.error"
        error-text="Enter a proper date"
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
      <base-input
        type="password"
        text="Confirm Password"
        v-model="form.confPassword.value"
        :error.sync="form.confPassword.error"
        error-text="Passwords must match"
        class="form-input"
      ></base-input>
      <base-radio
        label="By registering, I'm confirming that I have read and agreed to the 
Terms of Use and Privacy Policy."
        group="policy"
        val="agree"
        v-model="form.policy.value"
        :error="form.policy.error"
        class="policy"
      ></base-radio>
      <input type="submit" class="button sign-up" />
    </form>
    <p class="redir">
      Already have an accound?
      <span class="redir__link" @click="$router.push('/welcome/sign-in')">Sign In</span>
    </p>
  </section>
</template>

<script>
import api from "../../api";

export default {
  name: "SignUp",
  created() {
    if (this.$store.getters.getToken) {
      this.$router.push("/");
    }
    document.title = "EcoBeko | Sign Up";
  },
  components: {},
  methods: {
    async signUp() {
      const { name, surname, phone, password, confPassword, gender, birthday, policy } = this.form;
      this.test(name, surname, phone, password);
      confPassword.error = confPassword.value !== password.value;
      gender.error = gender.value === "";
      policy.error = policy.value === "";
      birthday.error = birthday.value === "";
      if (
        !name.error &&
        !surname.error &&
        !phone.error &&
        !password.error &&
        !confPassword.error &&
        !gender.error &&
        !birthday.error &&
        !policy.error
      ) {
        const response = await api.register(
          phone.value,
          name.value,
          surname.value,
          gender.value,
          password.value,
          birthday.value
        );

        if (response.data.err) {
          this.$refs.box.alert(response.data.err);
        } else {
          // the most hardcoded piece of doom, that I have ever done (sorry future me)
          const user = (await api.validate(phone.value, password.value)).data;
          this.$store.commit("setToken", user);
          this.$router.push("/");
        }
      }
    },
    test(...items) {
      for (const item of items) {
        item.error = !item.pattern.test(item.value);
      }
    }
  },
  data() {
    return {
      form: {
        name: {
          value: "",
          error: false,
          pattern: /[a-z-]+/i
        },
        surname: {
          value: "",
          error: false,
          pattern: /[a-z-]/i
        },
        phone: {
          value: "+7",
          error: false,
          pattern: /^([\+7])([0-9]+){10}/i
        },
        gender: {
          value: "",
          error: false
        },
        birthday: {
          value: "",
          error: false
        },
        password: {
          value: "",
          error: false,
          pattern: /(?=.{8,})/i
        },
        confPassword: {
          value: "",
          error: false
        },
        policy: {
          value: "",
          error: false
        }
      }
    };
  }
};
</script>

<style lang="scss" scoped>
@import "../../scss/_globals.scss";
@import "../../scss/_base.scss";

#sign-up {
  height: 100%;
  background-image: url("../../assets/background-sign-up.png");
  background-size: cover;
  background-position: 0% 20%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 0.2fr 1fr 0.1fr;
  justify-items: center;
  align-items: flex-end;
}

.title {
  align-self: flex-end;
  @include pos(3, 1);
  font-family: GilroyLight;
  font-size: 2rem;
  color: $grayText;
  border-bottom: 1px solid $grayText;
}

.form {
  @include pos(3, 2);
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
  @include pos(3, 3);
  align-self: flex-start;
  color: $grayText;
  font-size: 1.2rem;

  &__link {
    font-size: inherit;
    color: $accentBlue;
    cursor: pointer;
  }
}

@media screen and (max-width: 840px) {
  #sign-up {
    grid-template-columns: 1fr;
    grid-template-rows: 0.2fr 1fr 1fr 1fr 0.1fr;
    background-image: url("../../assets/background-sign-up-mobile.png");
  }

  .title {
    @include pos(1, 2);
    font-size: 3.5rem;
  }

  .form {
    @include pos(1, 3);
    width: 60%;

    h3,
    .sign-up,
    .form-input {
      font-size: 1.3rem;
    }
  }

  .redir {
    @include pos(1, 4);
    font-size: 1.4rem;
  }
}

@media screen and (max-width: 450px) {
  #sign-up {
    overflow-y: auto;
    height: 130%;
  }

  .title {
    font-size: 2rem;
  }

  .form {
    width: 90%;
    margin: 0;

    h3,
    .sign-up,
    .form-input {
      font-size: 1rem;
    }
  }

  .redir {
    font-size: 1rem;
    margin: 1.2em;
  }
}
</style>

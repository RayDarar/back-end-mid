<template>
  <div>
    <form class="form">
      <alert-box :time="1500" class="alert" ref="box"></alert-box>
      <h3>Account id: {{ user.id }}</h3>
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
    </form>
  </div>
</template>

<script>
export default {
  name: "AdminUsersUser",
  data() {
    return {
      form: {
        name: {
          value: "",
          error: false,
          pattern: /[a-z-]+/i,
        },
        surname: {
          value: "",
          error: false,
          pattern: /[a-z-]/i,
        },
        phone: {
          value: "+7",
          error: false,
          pattern: /^([\+7])([0-9]+){10}/i,
        },
      },
    };
  },
  props: {
    user: Object,
  },
  watch: {
    user: function(newUser, oldUser) {  
      this.form.name.value = newUser.first_name;
      this.form.surname.value = newUser.last_name;
      this.form.phone.value = newUser.phone_number;
    },
  },
};
</script>

<style lang="scss" scoped>
.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;

  h3 {
    align-self: center;
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
}
</style>

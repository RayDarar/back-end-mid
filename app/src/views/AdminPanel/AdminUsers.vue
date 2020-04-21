<template>
  <div id="users">
    <table class="list">
      <tr>
        <th class="list-header">ID</th>
        <th class="list-header">Name</th>
        <th class="list-header">Surname</th>
        <th class="list-header">Gender</th>
        <th class="list-header">Phone Number</th>
      </tr>
      <tr v-for="user in users" :key="user.id" class="list-item" @click="selected = user">
        <td>{{ user.id }}</td>
        <td>{{ user.first_name }}</td>
        <td>{{ user.last_name }}</td>
        <td>{{ user.gender }}</td>
        <td>{{ user.phone_number }}</td>
      </tr>
    </table>

    <admin-users-user :user="selected"></admin-users-user>
  </div>
</template>

<script>
import api from "@/api";
import AdminUsersUser from "./AdminUsersUser";

export default {
  name: "AdminUsers",
  methods: {
    async fetch() {
      const result = await api.getUsers();
      this.users = result;
    },
  },
  data() {
    return {
      users: [],
      selected: {},
    };
  },
  created() {
    this.fetch();
  },
  components: {
    AdminUsersUser,
  },
};
</script>

<style lang="scss" scoped>
#users {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 5em;
}

.list-header,
.list-item > td {
  padding: 0.5em;
  font-size: 1.2rem;
  text-align: center;
}
.list-item:nth-child(even) {
  background-color: #f9f9f9;
}
.list-item:hover {
  transform: scale(1.05);
  transform-origin: left;
  transition: transform 0.3s;
  cursor: pointer;
}
</style>

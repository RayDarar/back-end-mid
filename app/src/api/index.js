import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:80/api",
});

export default {
  async register(phone, name, surname, gender, password, birthday) {
    phone = phone.substr(1);
    gender = gender === "male" ? 1 : 0;
    const [year, month, day] = birthday.split("-");

    const body = {
      phone,
      name,
      surname,
      gender,
      password,
      birthday: `${day}-${month}-${year}`,
    };

    return await api.post("/users/create.php", body);
  },
  async validate(phone, password) {
    phone = phone.substr(1);

    const body = {
      phone,
      password,
    };

    return await api.post("/users/validate.php", body);
  },
  async getUsers() {
    let result = await api.get("/users/get.php");
    return result.data.data.map((item) => {
      item.gender = item.gender == "1" ? "male" : "female";
      return item;
    });
  },
  async updateUser(id, name, surname, phone) {
    const result = await api.put("/users/update.php", {
      id,
      name,
      surname,
      phone,
    });

    return result.status == 200;
  },
  async deleteUser(id) {
    const result = await api.delete("/users/delete.php", {
      id,
    });

    return result.status == 200;
  },
  async countUsers() {
    return await api.get("/stats/count.php");
  },
  async generateMatrix() {
    return await api.get("stats/generate.php");
  },
};

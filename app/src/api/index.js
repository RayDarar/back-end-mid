import axios from "axios";

const source = "django"; // django

const api = axios.create({
  baseURL: "http://localhost:8000/api",
});

globalThis.api = api;

const resolveSource = (point) => {
  if (source == "php") return point + ".php";
  else if (source == "django") return point;
};

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

    return await api.post(resolveSource("/users/create"), body);
  },
  async validate(phone, password) {
    phone = phone.substr(1);

    const body = {
      phone,
      password,
    };

    return await api.post(resolveSource("/users/validate"), body);
  },
  async getUsers() {
    let result = await api.get(resolveSource("/users/get"));

    return result.data.data.map((item) => {
      item.gender = item.gender == "1" ? "male" : "female";
      return item;
    });
  },
  async updateUser(id, name, surname, phone) {
    phone = phone.substr(1);
    const result = await api.put(resolveSource("/users/update"), {
      id,
      name,
      surname,
      phone,
    });

    return result.status == 200;
  },
  async deleteUser(id) {
    const result = await api.delete(resolveSource("/users/delete"), {
      id,
    });

    return result.status == 200;
  },
  async countUsers() {
    return await api.get(resolveSource("/stats/count"));
  },
  async generateMatrix() {
    return await api.get(resolveSource("stats/generate"));
  },
};

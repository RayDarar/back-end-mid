import axios from "axios";

const api = axios.create({
  baseURL: "http://localhost:80/eco-beko/api"
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
      birthday: `${day}-${month}-${year}`
    };

    return await api.post("/users/create.php", body);
  }
};

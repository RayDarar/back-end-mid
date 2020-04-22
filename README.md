# SDU Back-end's mid project

Project is build using Vue and PHP as REST Api back-end.

## Containing folders

- `app/` - Vue CLI project
- `api/users` - REST Api routes

## Project setup

### Prepare web-app

1. Go to `app/` folder.
2. Install dependencies using `yarn` or `npm install`.
3. Issue `yarn build` or `npm run build` commands to build static files at `static/` folder;
4. Go `app/src/api/index.js` and replace baseUrl for your api requests.

```js
const api = axios.create({
  baseURL: "your base url",
});
```

### In Case of PHP server

1. Serve `php-server/api/` and `static/` folders with your php server

Assuming you are using xampp installed on /opt/lampp: `cp -r php-server/api static/* /opt/lampp/htdocs/`

2. Run apache and mysql server
3. Run `eco_beko.sql` at your mysql database

### In Case of Django Server

1. In `django-server` folder issue `python3 -m venv env` command
2. Activate the environment: `source env/bin/activate` (In Linux)
3. Install django: `pip install django`

## Compile web-app for development

In `app/` issue `yarn serve`. (Do not forget to run your php server that serves `api/` folder)

## API

### PHP server

#### (GET) api/users/get.php

**Response example:**

```json
{
  "rows": 4,
  "data": [
    // array of users
    {
      "id": "12",
      "first_name": "Test",
      "last_name": "Test",
      "gender": "1",
      "password": "f3823903b2dd6e35243b1bbe5a14f651",
      "birthday": "2000-12-12",
      "phone_number": "77086144677"
    }
  ]
}
```

#### (POST) api/users/validate.php

**Request Example:**

```json
{
  "phone": "77086144677",
  "password": "awdawdawd"
}
```

**Response Example-1:**

```json
{
  "err": "password is incorrect"
}
```

**Response Example-2:**

```json
{
  "id": "12",
  "name": "Test",
  "surname": "Test",
  "phone": "77086144677",
  "birthday": "2000-12-12",
  "gender": "male"
}
```

#### (POST) api/users/create.php

**Request Example:**

```json
{
  "name": "Test",
  "surname": "Test",
  "phone": "77086144677",
  "birthday": "2000-12-12",
  "gender": 1,
  "password": "awdawdawd"
}
```

**Response Example-1:**

```json
{
  "err": "user exists"
}
```

**Response Example-2:**

```json
{
  "status": "success"
}
```

#### (PUT) api/users/update.php

**Request Example:**

```json
{
  "id": 17,
  "name": "Test",
  "surname": "User",
  "phone": "77086144676"
}
```

#### (DELETE) api/users/delete.php

**Request Example:**

```json
{
  "id": 17
}
```

#### (GET) api/stats/count.php

**Response Example:**

```json
{
  "count": 17
}
```

#### (GET) api/stats/generate.php

**Response Example:**

```json
{
  "matrix": [
    [
      // data
    ]
  ]
}
```

### Django server

#### (GET) /api/users/get

**Response Example:**

```json
[
  {
    "pk": 1,
    "fields": {
      "first_name": "Ansar",
      "last_name": "Ryspekov",
      "gender": 1,
      "birthday": "2020-04-22",
      "phone_number": "77086144672"
    }
  },
  {
    "pk": 2,
    "fields": {
      "first_name": "Tomiris",
      "last_name": "Ryspekova",
      "gender": 0,
      "birthday": "2020-04-22",
      "phone_number": "77086144670"
    }
  }
]
```

#### (POST) api/users/validate

**Request Example:**

```json
{
  "phone": "77086144677",
  "password": "awdawdawd"
}
```

**Response Example-1:**

```json
{
  "err": "password is incorrect"
}
```

**Response Example-2:**

```json
{
  "id": "12",
  "name": "Test",
  "surname": "Test",
  "phone": "77086144677",
  "birthday": "2000-12-12",
  "gender": "male"
}
```

#### (POST) api/users/create

**Request Example:**

```json
{
  "name": "Test",
  "surname": "Test",
  "phone": "77086144677",
  "birthday": "2000-12-12",
  "gender": 1,
  "password": "awdawdawd"
}
```

**Response Example-1:**

```json
{
  "err": "user exists"
}
```

**Response Example-2:**

```json
{
  "status": "success"
}
```

#### (PUT) api/users/update

**Request Example:**

```json
{
  "id": 17,
  "name": "Test",
  "surname": "User",
  "phone": "77086144676"
}
```

#### (DELETE) api/users/delete

**Request Example:**

```json
{
  "id": 17
}
```

#### (GET) api/stats/count

**Response Example:**

```json
{
  "count": 17
}
```

#### (GET) api/stats/generate

**Response Example:**

```json
{
  "matrix": [
    [
      // data
    ]
  ]
}
```

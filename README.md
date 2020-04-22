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

## Compile web-app for development

In `app/` issue `yarn serve`. (Do not forget to run your php server that serves `api/` folder)

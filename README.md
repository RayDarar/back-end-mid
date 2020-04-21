# SDU Back-end's mid project

Project is build using Vue and PHP as REST Api back-end.

## Containing folders

- `app/` - Vue CLI project
- `api/users` - REST Api routes

## Project setup

1. Go to `app/` folder.
2. Install dependencies using `yarn` or `npm install`.
3. Issue `yarn build` or `npm run build` commands to build static files at `static/` folder;
4. Go `api/index.js` and replace baseUrl for your api requests.

```js
const api = axios.create({
  baseURL: "your base url",
});
```

5. Serve `api/` and `static/` folders with your php server

## Compile web-app for development

In `app/` issue `yarn serve`. (Do not forget to run your php server that serves `api/` folder)

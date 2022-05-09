require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes.js';
Vue.use(VueRouter);

let app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
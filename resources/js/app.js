require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes.js';
import Vuex from 'vuex';
import store from './store/store.js';
Vue.use(VueRouter);
Vue.use(Vuex);
let app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
    store : new Vuex.Store(store)
});
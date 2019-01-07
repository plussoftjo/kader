require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
window.Vue.use(Vuetify);
window.Vue.use(VueRouter);

import { routes } from './adminRoutes.js';
import 'vuetify/dist/vuetify.min.css';

const router = new VueRouter({
  routes,
  scrollBehavior (proudect, home, savedPosition) {
  return { x: 0, y: 0 }
}
});
import main from './admin/main.vue';
const app = new Vue({
    el: '#app',
    router,
    render: h => h(main)
});

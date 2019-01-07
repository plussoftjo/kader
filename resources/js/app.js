require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import ar from './locale/ar.ts'
import en from './locale/en.ts'


var lang = localStorage.getItem('lang');
console.log(lang)
if (lang == '') {
	localStorage.setItem('lang','ar');
}
var lang = localStorage.getItem('lang');
if(lang == 'ar') {
window.Vue.use(Vuetify,{
	rtl:true,
	lang: {
		locales: {ar,en},
		current:ar
	}
});
}else {
window.Vue.use(Vuetify,{
	rtl:false,
	lang: {
		locales: {ar,en},
		current:en
	}
});	
}



window.Vue.use(VueRouter);

import { routes } from './routes.js';
import 'vuetify/dist/vuetify.min.css';

const router = new VueRouter({
  routes,
  scrollBehavior (proudect, home, savedPosition) {
  return { x: 0, y: 0 }
}
});
import main from './components/main.vue';
const app = new Vue({
    el: '#app',
    router,
    render: h => h(main)
});

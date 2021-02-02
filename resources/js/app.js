/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



import ExampleComponent from "./components/ExampleComponent";

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


//Fonts

import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'


// Axios
import axios from 'axios'
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

// ShowModal
import VModal from 'vue-js-modal/dist/index.nocss.js'
import 'vue-js-modal/dist/styles.css'
Vue.use(VModal)

// Multiselect
import Multiselect from 'vue-multiselect'
Vue.use(Multiselect);

//Vuelidate
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);
// Vue.use(window.vuelidate.default)

// window.axios = require('axios');
import Vue from 'vue'

import VueRouter from 'vue-router'
import App from './components/views/App'
import Login from './components/views/login/Login'
import Registration from './components/views/registration/Registration'
import AdminComponent from './components/welcome/AdminComponent'
import TaskComponent from './components/welcome/TaskComponent'
import UserComponent from './components/welcome/UserComponent'
import UpdateComponent from './components/welcome/UpdateComponent'



Vue.use(VueRouter)


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/',
            name: 'registration',
            component: Registration,
        },
        {
            path: '/admin',
            name: 'admin',
            component: AdminComponent,
        },
        {
            path: '/task',
            name: 'task',
            component: TaskComponent,
        },
        {
            path: '/user',
            name: 'user',
            component: UserComponent,
        },
        {
            path: '/update',
            name: 'update',
            component: UpdateComponent,
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

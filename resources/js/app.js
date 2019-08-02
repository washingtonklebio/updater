require('./bootstrap');

window.Vue = require('vue')

import 'material-design-icons-iconfont/dist/material-design-icons.css'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'

import FormLogin from './components/FormLogin.vue'
import MainMenu from './components/MainMenu.vue'

import Vue from 'vue'
import Vuetify from 'vuetify/lib'

Vue.use(Vuetify,{iconfont: 'mdi' })

const vuetify = require('vuetify')

Vue.component('example-component', require('./components/ExampleComponent.vue').default)

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    components: {
        FormLogin, MainMenu
    }
})

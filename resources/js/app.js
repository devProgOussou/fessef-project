/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import FlashMessage from '@smartweb/vue-flash-message';
import Dashboard from '../js/Pages/Association/Dashboard';
import ShowAll from '../js/Pages/Feusseul/ShowAll';
import moment from 'moment';

Vue.component('pagination', require('laravel-vue-pagination'));
var VueTruncate = require('vue-truncate-filter')
Vue.filter('timeformat',(arg)=>{
    return moment(arg).startOf('minutes').fromNow();
})
Vue.use(FlashMessage);
Vue.use(plugin)
Vue.use(VueTruncate)

const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(el)

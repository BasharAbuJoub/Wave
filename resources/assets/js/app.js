
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy);



Vue.component('icon', require('./components/Icon.vue'));
Vue.component('subheader', require('./components/Subheader.vue'));
Vue.component('overview-table', require('./components/OverviewTable.vue'));
Vue.component('device', require('./components/Device.vue'));
Vue.component('devices', require('./components/Devices.vue'));
Vue.component('create-device', require('./components/devices/create.vue'));
Vue.component('edit-device', require('./components/devices/edit.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

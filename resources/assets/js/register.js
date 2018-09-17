
window.Vue = require('vue');

Vue.component('countdown', require('./components/Countdown.vue'));

const app = new Vue({
    el: '#register'
});

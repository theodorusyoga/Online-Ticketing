
window.Vue = require('vue');

Vue.component('Countdown', require('./components/Countdown.vue'));

const app = new Vue({
    el: '#register'
});

import $ from 'jquery';
import axios from 'axios';
import Cookie from 'js-cookie'
require('./bootstrap');
window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('register-step1', require('./components/RegisterStep1.vue'));
Vue.component('register-step2', require('./components/RegisterStep2.vue'));
Vue.component('register-step3', require('./components/RegisterStep3.vue'));
Vue.component('register-finish', require('./components/RegisterFinish.vue'));
Vue.component('register-payment', require('./components/RegisterPayment.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('dashboard', require('./components/Dashboard.vue'));

const app = new Vue({
    el: '#app'
});

const onScroll = () => {
    const scroll = $('html, body').scrollTop();
    const opened = $('.navbar-collapse').hasClass('active');
        if(scroll > 100){
            $('.upr-custom-navbar').addClass('active');
        } else {
            if(!opened){
                $('.upr-custom-navbar').removeClass('active');
            }
        }
};

export const getToken = async () => {
    let token = '';
    await axios.post('/api/login', {
        email: 'admin@wgg-globalupr.com',
        password: 'pass@word1'
    }, {
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        token = response.data.token;
        Cookie.set('token', token)
    })
    return token;
};

const getUserTypes = async (token) => {
    let usertypes = [];
    await axios.get('/api/get-user-types', {
        headers: {
            'Authorization': `Bearer ${token}`
        }
    }).then((response) => {
        usertypes = response.data;
    })
    return usertypes;
}

const postJoinAsVolunteer = async (token, data) => {
    let status = {};
    await axios.post('/api/join-volunteer', data, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    }).then((response) => {
        status = response.data;
    })
    return status;
}

const postDonation = async (token, data) => {
    let status = {};
    await axios.post('/api/confirm-donate', data, {
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    }).then((response) => {
        status = response.data;
    })
    return status;
}

$(document).ready(() => {
    onScroll();
    $(window).scroll(onScroll);

    if(window.location.pathname === '/'){
        const search = window.location.search;
        if(search !== '') {
            const scrollTop = $('#header-home').offset().top + 60;
            $('html, body').animate({
                scrollTop
            }, 500);
        }
    }

    $('.navbar-toggler').click(() => {
        const opened = $('.navbar-collapse').hasClass('active');
        console.log(opened)
        if(opened){
            $('.navbar-collapse').removeClass('active');
            const scroll = $('html, body').scrollTop();
            if(scroll <= 100){
                $('.upr-custom-navbar').removeClass('active');
            }
        } else {
            $('.navbar-collapse').addClass('active');
            $('.upr-custom-navbar').addClass('active');
        }
    });

    $('#about-link').click(() => {
        if(window.location.pathname === '/'){
            const scrollTop = $('#header-home').offset().top + 60;
            $('html, body').animate({
                scrollTop
            }, 500);
        } else {
            window.location.replace('/?goto=about');
        }
    });

    $('#join-volunteer-link').click(async () => {
        $('#success-alert').hide();
        $('#error-alert').hide();
        $('.volunteer-loading').show();
        $('#volunteer-submit').attr('disabled', true);
        $('#user-types').attr('disabled', true);

        $('#modal-volunteer').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });

        const token = await getToken();
        const usertypes = await getUserTypes(token);

        setTimeout(() => {
            $('#user-types').html('');
            for (const key in usertypes) {
                if (usertypes.hasOwnProperty(key)) {
                    const usertype = usertypes[key];
                    const option = $('<option></option>').attr('value', usertype.id).text(usertype.type);
                    $('#user-types').append(option);
                }
            }

            $('#user-types').removeAttr('disabled');
            $('#volunteer-submit').removeAttr('disabled');
            $('.volunteer-loading').hide();
        }, 1000);
    });

    $('#volunteer-form').submit(async (e) => {
        e.preventDefault();
        $('#volunteer-success-alert').hide();
        $('#volunteer-error-alert').hide();
        $('.volunteer-loading').show();
        $('#volunteer-submit').attr('disabled', true);

        const data = {
            fullname: $('#fullname').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            usertypeid: $('#user-types').val()
        };
        const token = await getToken();
        const result = await postJoinAsVolunteer(token, data);

        setTimeout(() => {
            if(result.status == 0){
                $('#volunteer-success-alert').show();
                $('#volunteer-error-alert').hide();
                $('#fullname').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#user-types').val('');
            } else {
                $('#volunteer-success-alert').hide();
                $('#volunteer-error-alert').show();
            }

            $('#volunteer-submit').removeAttr('disabled');
            $('.volunteer-loading').hide();
        }, 1000);
    });

    $('#donation-form').submit(async (e) => {
        e.preventDefault();
        $('#donation-success-alert').hide();
        $('#donation-error-alert').hide();
        $('.donation-loading').show();
        $('#donation-submit').attr('disabled', true);

        let data = new FormData();
        data.append('name', $('#name').val());
        data.append('bank', $('#bank').val());
        data.append('amount', $('#amount').val());
        data.append('transfer_date', $('#date').val());
        data.append('other', $('#other').val());
        data.append('file', $('#file')[0].files[0]);

        const token = await getToken();
        const result = await postDonation(token, data);

        setTimeout(() => {
            if(result.status == 0){
                $('#donation-success-alert').show();
                $('#donation-error-alert').hide();
                $('#name').val('');
                $('#bank').val('');
                $('#amount').val('');
                $('#date').val('');
                $('#other').val('');
                $('#file').val('');
            } else {
                $('#donation-success-alert').hide();
                $('#donation-error-alert').show();
            }

            $('#donation-submit').removeAttr('disabled');
            $('.donation-loading').hide();
        }, 1000);
    });
});

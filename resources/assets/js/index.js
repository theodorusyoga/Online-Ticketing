import $ from 'jquery';
import axios from 'axios';
require('./bootstrap');

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

const getToken = async () => {
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

const postConfirmation = async (token, data) => {
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

    $('.navbar-toggler').click(() => {
        const opened = $('.navbar-collapse').hasClass('active');
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

    $('#donation-confirm').click(async () => {
        $('#success-alert').hide();
        $('#error-alert').hide();
        $('.donation-loading').show();
        $('#donation-submit').attr('disabled', true);
        $('#user-types').attr('disabled', true);

        $('#modal-donation').modal({
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
            $('#donation-submit').removeAttr('disabled');
            $('.donation-loading').hide();
        }, 1000);
    });

    $('#donation-form').submit(async (e) => {
        e.preventDefault();
        $('#success-alert').hide();
        $('#error-alert').hide();
        $('.donation-loading').show();
        $('#donation-submit').attr('disabled', true);

        const data = {
            fullname: $('#fullname').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            usertypeid: $('#user-types').val()
        };
        const token = await getToken();
        const result = await postConfirmation(token, data);

        setTimeout(() => {
            if(result.status == 0){
                $('#success-alert').show();
                $('#error-alert').hide();
                $('#fullname').val('');
                $('#email').val('');
                $('#phone').val('');
                $('#user-types').val('');
            } else {
                $('#success-alert').hide();
                $('#error-alert').show();
            }

            $('#donation-submit').removeAttr('disabled');
            $('.donation-loading').hide();
        }, 1000);
    })
});

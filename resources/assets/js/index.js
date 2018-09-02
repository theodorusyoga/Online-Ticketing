import $ from 'jquery';
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

    $('#donation-confirm').click(() => {
        $('#modal-donation').modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
    });
});

import $ from 'jquery';

$(document).ready(() => {
    $(window).scroll(() => {
        const scroll = $('html, body').scrollTop();
        if(scroll > 100){
            $('.upr-custom-navbar').addClass('active');
        } else {
            $('.upr-custom-navbar').removeClass('active');
        }
    })
});

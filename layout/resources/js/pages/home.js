'use strict';

$(document).ready(() => {
    const cartXpressEmployeeIntroduction = $('.cart-xpress-emlpoyee-introduction .main-box');
    const fadeTrigger = $('#fade-trigger');

    $(window).on('scroll', () => {
        if(fadeTrigger[0].getBoundingClientRect().y <= 0) 
            cartXpressEmployeeIntroduction.removeClass('bg-xpress-gray-100');
        else
            cartXpressEmployeeIntroduction.addClass('bg-xpress-gray-100');
    });
});
'use strict';

$(document).ready(() => {

    /*---------------------------------------------------OBJECT INSTANTIATION----*/
    const functionUtils = new FunctionUtils();

    /*---------------------------------------------------INSTANCE VARIABLE----*/
    const cartXpressEmployeeIntroduction = $('.cart-xpress-emlpoyee-introduction .main-box');
    const fadeTrigger = $('#fade-trigger');
    const cartSidebar = $('.cart-sidebar');
    const cartSidebarSpace = $('.cart-sidebar-space');
    const showCartBtn = $('#show-cart-btn');
    const sidebarCloseBtn = $('#sidebar-close-btn');
    const rightSidebar = $('.right-slidebar');
    const searchManager = $('.search-manager');

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    // show home details by slide
    const slideHomeDetails = () => {
        if(fadeTrigger[0].getBoundingClientRect().y <= 0) 
            cartXpressEmployeeIntroduction.removeClass('bg-xpress-gray-100');
        else 
            cartXpressEmployeeIntroduction.addClass('bg-xpress-gray-100');
    };

    // click and slide opposite sidebars
    const slideOffOppositeSidebars = () => { 
        cartSidebar.removeClass('slide-it-vertical-left'); 
        cartSidebarSpace.removeClass('shrink-it-vertical');
        rightSidebar.fadeOut(250);
        searchManager.slideUp(250);
    };

    const slideOnOppositeSidebars = () => { 
        cartSidebar.addClass('slide-it-vertical-left');
        cartSidebarSpace.addClass('shrink-it-vertical');
        rightSidebar.fadeIn(250);
        searchManager.slideDown(250);
    };
    /*---------------------------------------------------INVOKE METHODS----*/
    // function utils
    functionUtils.setComponent($(window));
    functionUtils.setScroll(slideHomeDetails);
    functionUtils.setComponent(showCartBtn);
    functionUtils.setClick(slideOffOppositeSidebars);
    functionUtils.setComponent(sidebarCloseBtn);
    functionUtils.setClick(slideOnOppositeSidebars);
});
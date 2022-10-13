'use strict';

$(document).ready(() => {

    /*---------------------------------------------------OBJECT INSTANTIATION----*/
    const functionUtils = new FunctionUtils();

    /*---------------------------------------------------INSTANCE VARIABLE----*/
    const cartXpressEmployeeIntroduction = $('.cart-xpress-emlpoyee-introduction .main-box');
    const fadeTrigger =                    $('#fade-trigger');
    const cartSidebar =                    $('.cart-sidebar');
    const cartSidebarSpace =               $('.cart-sidebar-space');

    const showCartBtn =                    $('#show-cart-btn');
    const addCartBtn =                     $('#add-cart-btn');
    const showHomeBtn =                    $('#show-home-btn');
    const hideHomeBtn =                    $('#hide-home-btn');
    const sidebarCloseBtn =                $('#sidebar-close-btn');

    const rightSidebar =                   $('.right-slidebar');
    const searchManager =                  $('.search-manager');
    const nav =                            $('nav');
    const cartXpressMainContent =          $('.cart-xpress-main-content');
    const homeDetails =                    $('.cart-xpress-header, .cart-xpress-details, .cart-xpress-emlpoyee-details, .cart-xpress-emlpoyee-introduction');

    const footer =                         $('footer');

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    // show details by scrolling

    const slideHomeDetails = () => {
        // employee details
        if(fadeTrigger[0].getBoundingClientRect().y <= 0) 
            cartXpressEmployeeIntroduction.removeClass('bg-xpress-gray-100');
        else 
            cartXpressEmployeeIntroduction.addClass('bg-xpress-gray-100');

        // shop details
        if(cartXpressMainContent[0].getBoundingClientRect().y <= 0) {
            nav.removeClass('sticky-top')

            searchManager
                .addClass('sticky-top')
                .removeClass('bg-xpress-gray-100')
                .addClass('bg-opaque-xpress-gray-100');
        } else {
            nav.addClass('sticky-top')

            searchManager
                .removeClass('sticky-top')
                .addClass('bg-xpress-gray-100')
                .removeClass('bg-opaque-xpress-gray-100');
        }

        // footer details
        if(footer[0].getBoundingClientRect().y <= searchManager[0].getBoundingClientRect().height) {
            nav.addClass('sticky-top')
            searchManager.removeClass('sticky-top');
        } else {
            if(cartXpressMainContent[0].getBoundingClientRect().y <= 0) {
                nav.removeClass('sticky-top')
                searchManager.addClass('sticky-top');
            }
        }
    };

    // click and slide opposite sidebars
    const slideToggleOppositeSidebars = () => { 
        cartSidebar.toggleClass('slide-it-vertical-left'); 
        cartSidebarSpace.toggleClass('shrink-it-vertical');
        rightSidebar.fadeToggle(250);
        searchManager.slideToggle(250);
    };

    // click to modify home details
    const showHomeDetails = () => {
        homeDetails.slideDown(250);
        hideHomeBtn.show();
        showHomeBtn.hide();
    }

    const hideHomeDetails = () => {
        homeDetails.slideUp(250);
        hideHomeBtn.hide();
        showHomeBtn.show();
    }
    /*---------------------------------------------------INVOKE METHODS----*/
    // function utils
    functionUtils
        .setComponent($(window))
        .setScroll(slideHomeDetails)

        .setComponent(showCartBtn)
        .setClick(slideToggleOppositeSidebars)

        .setComponent(addCartBtn)
        .setClick(slideToggleOppositeSidebars)

        .setComponent(sidebarCloseBtn)
        .setClick(slideToggleOppositeSidebars)

        .setComponent(showHomeBtn)
        .setClick(showHomeDetails)

        .setComponent(showCartBtn)
        .setClick(showHomeDetails)

        .setComponent(hideHomeBtn)
        .setClick(hideHomeDetails);
});
'use strict';

$(document).ready(() => {

    /*---------------------------------------------------INSTANCE VARIABLE----*/
    const showBelowClasses =                  'position-fixed bottom-0 end-0';

    const checkoutBox =                       $('.checkout-box');
    const shoppingCartContent =               $('.shopping-cart-content');

    /*---------------------------------------------------OBJECT INSTANTIATION----*/
    const functionUtils =                     new FunctionUtils();

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    const showCheckoutBelow = () => {
        
        if(shoppingCartContent[0].getBoundingClientRect().y <= 0)
            checkoutBox.addClass(showBelowClasses);
        else 
            checkoutBox.removeClass(showBelowClasses);  
        
    };
    
    /*---------------------------------------------------INVOKE METHODS----*/
    functionUtils
    .setComponent($(window))
    .setScroll(showCheckoutBelow);

});
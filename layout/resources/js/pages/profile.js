'use strict';

$(document).ready(() => {

    /*---------------------------------------------------INSTANCE VARIABLE----*/
    const dropdownBtn =                       $('.dropdown-btn');
    const emptySection =                      $('.empty-section');
    const orderWrapper =                      $('.order-wrapper');

    /*---------------------------------------------------OBJECT INSTANTIATION----*/
    const functionUtils =                     new FunctionUtils();

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    const showDropdown = event => {
        emptySection.eq(event.currentTarget.dataset.index).slideToggle(250);
        orderWrapper.eq(event.currentTarget.dataset.index).slideToggle(250);
    };
    
    /*---------------------------------------------------INVOKE METHODS----*/
    functionUtils
        .setComponent(dropdownBtn)
        .setClick(showDropdown);

});
'use strict';

$(document).ready(() => {

    /*---------------------------------------------------INSTANCE VARIABLE----*/
    const register =                          $('.register');
    const registerCover =                     $('.register-cover');

    /* CUSTOMER */
    const customerComponent =                 $('.customer-component');
    const customerConfirmBtn =                $('#customer-confirm-btn');

    const customerProfileBtn =                $('.customer-component #profile-btn');
    const customerBackgroundBtn =             $('.customer-component #background-btn');

    const customerProfileImageInput =         $('.customer-component #profileImagePath');
    const customerBackgroundImageInput =      $('.customer-component #backgroundImagePath');

    const customerProfileImageDisplayer =     $('.customer-component #profileImageDisplay');
    const customerBackgroundImageDisplayer =  $('.customer-component #backgroundImageDisplay');

    /* EMPLOYEE */
    const employeeComponent =                 $('.employee-component');
    const employeeConfirmBtn =                $('#employee-confirm-btn');

    const employeeProfileBtn =                $('.employee-component #profile-btn');
    const employeeBackgroundBtn =             $('.employee-component #background-btn');

    const employeeProfileImageInput =         $('.employee-component #profileImagePath');
    const employeeBackgroundImageInput =      $('.employee-component #backgroundImagePath');

    const employeeProfileImageDisplayer =     $('.employee-component #profileImageDisplay');
    const employeeBackgroundImageDisplayer =  $('.employee-component #backgroundImageDisplay');

    /*---------------------------------------------------OBJECT INSTANTIATION----*/
    const functionUtils =                     new FunctionUtils();

    /* CUSTOMER */
    const customerProfileUploadUtils =        new UploadUtils(customerProfileImageInput, customerProfileImageDisplayer).setChange();
    const customerBackgroundUploadUtils =     new UploadUtils(customerBackgroundImageInput, customerBackgroundImageDisplayer).setChange();

    /* EMPLOYEE */
    const employeeProfileUploadUtils =        new UploadUtils(employeeProfileImageInput, employeeProfileImageDisplayer).setChange();
    const employeeBackgroundUploadUtils =     new UploadUtils(employeeBackgroundImageInput, employeeBackgroundImageDisplayer).setChange();

    /*---------------------------------------------------METHOD INSTANTIATION----*/
    // transform register component when scrolled
    const registerTransformation = () => {
        if(register[0].getBoundingClientRect().y <= 0) 
            registerCover
                .addClass('form-transformation')
                .removeClass('bg-opaque-xpress-black-200')
                .addClass('bg-xpress-gray-200');
        else
            registerCover
                .removeClass('form-transformation')
                .addClass('bg-opaque-xpress-black-200')
                .removeClass('bg-xpress-gray-200');
    };

    // click the file input
    const initTriggerFileEvent = (profileUploadUtils, backgroundUploadUtils) => {

        return event => {

            const { isProfile } = event.currentTarget.dataset;
    
            if(isProfile.toLowerCase() === 'true') profileUploadUtils.trigger();

            else backgroundUploadUtils.trigger();

        };

    };

    // show customer or employee form
    const initShowForm = isCustomer => {

        return () => {

            let userComponent = isCustomer ? customerComponent : employeeComponent;

            userComponent.show();

            if(isCustomer) userComponent.next().hide();
            else userComponent.prev().hide();

        };

    };
    
    /*---------------------------------------------------INVOKE METHODS----*/
    // function utils
    functionUtils
        .setComponent($(window))
        .setScroll(registerTransformation)

        .setComponent($(customerProfileBtn))
        .setClick(
            initTriggerFileEvent(
                customerProfileUploadUtils, customerBackgroundUploadUtils))

        .setComponent($(customerBackgroundBtn))
        .setClick(
            initTriggerFileEvent(
                customerProfileUploadUtils, customerBackgroundUploadUtils))

        .setComponent($(employeeProfileBtn))
        .setClick(
            initTriggerFileEvent(
                employeeProfileUploadUtils, employeeBackgroundUploadUtils))

        .setComponent($(employeeBackgroundBtn))
        .setClick(
            initTriggerFileEvent(
                employeeProfileUploadUtils, employeeBackgroundUploadUtils))
                
        
        .setComponent($(customerConfirmBtn))
        .setClick(initShowForm(true))
        
        .setComponent($(employeeConfirmBtn))
        .setClick(initShowForm(false));

});
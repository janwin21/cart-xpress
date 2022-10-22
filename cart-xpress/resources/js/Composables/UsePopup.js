'use strict';

import { ref } from 'vue';
import $ from 'jquery';

export function usePopup() {

    const termsAndAgreementRef = ref(null);
    const oneWayOption = ref(null);
    const twoWayOption = ref(null);

    function showTermsOfAgreementPopup() {
        $('body').toggleClass('overflow-hidden')
        $(termsAndAgreementRef.value).fadeToggle(250);
    };

    function showOneWayOptionPopup() {
        $('body').toggleClass('overflow-hidden')
        $(oneWayOption.value).fadeToggle(250);
    };

    function showTwoWayOptionPopup() {
        $('body').toggleClass('overflow-hidden')
        $(twoWayOption.value).fadeToggle(250);
    };

    return {
        termsAndAgreementRef,
        oneWayOption,
        twoWayOption,
        showTermsOfAgreementPopup,
        showOneWayOptionPopup,
        showTwoWayOptionPopup
    };

}
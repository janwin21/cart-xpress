'use strict';

import { ref } from 'vue';
import $ from 'jquery';

export function usePopup() {

    const termsAndAgreementRef = ref(null);

    function showTermsOfAgreementPopup() {
        $('body').toggleClass('overflow-hidden')
        $(termsAndAgreementRef.value).fadeToggle(250);
    };

    return {
        termsAndAgreementRef,
        showTermsOfAgreementPopup
    };

}
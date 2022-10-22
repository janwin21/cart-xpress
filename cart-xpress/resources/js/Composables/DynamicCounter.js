'use strict';

import { ref } from 'vue';

export function dynamicCounter(initialValue) {

    const incrementValue = ref(initialValue);
    const counters = ref([]);
    
    const load = function load(event) {
        const index = event.target.dataset.index

        if(counters.value[index]) {
            counters.value[index] += incrementValue.value;
        } else {
            counters.value[index] = incrementValue.value * 2;
        }
    };

    return {
        incrementValue,
        counters,
        load
    }

};
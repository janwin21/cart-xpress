'use strict';

import _ from 'lodash';
import { ref } from 'vue';

export function dynamicSort() {

    const property = ref('name');
    const orderedThrough = ref('desc');

    const dynamicSortBy = (objs, childProperty, givenProperty, orderBy) => {

        objs.forEach(obj => {
            obj[childProperty] = 
                _.orderBy(obj[childProperty], [child => child[givenProperty]], [orderBy]);
        });

    };

    return {
        property,
        orderedThrough,
        dynamicSortBy
    };

}
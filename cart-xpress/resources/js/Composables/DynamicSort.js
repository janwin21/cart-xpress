'use strict';

import _ from 'lodash';
import { ref } from 'vue';

export function dynamicSort() {

    const property = ref('name');
    const orderedThrough = ref('desc');

    const dynamicSortBy = (objs, childProperty, givenProperty, orderBy) => {

        objs.forEach(obj => {
            if(orderBy === 'asc')
                obj[childProperty]
                    .sort((a, b) => { return a[givenProperty] < b[givenProperty] ? 1 : -1; })
                        .reverse();
            if(orderBy === 'desc')
                obj[childProperty]
                    .sort((a, b) => { return a[givenProperty] < b[givenProperty] ? 1 : -1; });
        });

    };

    return {
        property,
        orderedThrough,
        dynamicSortBy
    };

}
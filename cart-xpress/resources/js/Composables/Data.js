'use strict';

import _ from 'lodash';

export function data() {

    const removeEmptyCategories = categories => {
        return _.filter(categories, category => category.products.length > 0);
    };

    return {
        removeEmptyCategories
    };

}
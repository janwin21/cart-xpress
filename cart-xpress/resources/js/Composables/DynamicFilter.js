'use strict';

export function dynamicFilter() {

    const filterItems = (searchedValue, items) => {

        return _.filter(items, products => {
                const regex = new RegExp(`${searchedValue}`, 'gi');
                const match = products.name.match(regex);
                const matched = (match) ? match.length : 0;
                return matched != 0;
         });
         
    }

    return {
        filterItems
    };

}
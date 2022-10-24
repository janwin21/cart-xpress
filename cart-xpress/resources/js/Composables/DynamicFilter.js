'use strict';

export function dynamicFilter(property = 'name') {

    const filterItems = (searchedValue, items) => {

        return _.filter(items, item => {
            const regex = new RegExp(`${searchedValue}`, 'gi');
            const match = item[property].match(regex);
            const matched = (match) ? match.length : 0;
            return matched != 0;
         });
         
    }

    return {
        filterItems
    };

}
'use strict';

import { ref, watch } from 'vue';

export function useTotal(shops) {

    const totalQuantity = ref(0)
    const totalPrice = ref(0);

    watch(shops, function(newShops) {
        
        totalQuantity.value = _.sumBy(shops, shop => {

            console.log('CALL');

            return _.sumBy(shop.products, product => {

                return product.orderDetails.quantityOrdered;

            });

        });

        totalPrice.value = _.sumBy(shops, shop => {

            return _.sumBy(shop.products, product => {

                const discountPrice = product.price * product.discount;
                const singleTOtalPrice = product.price - discountPrice;
                   
                return singleTOtalPrice * product.orderDetails.quantityOrdered;

            });

        });

    }, {
        deep: true,
        immediate: true
    });

    return {
        totalQuantity,
        totalPrice
    }

}
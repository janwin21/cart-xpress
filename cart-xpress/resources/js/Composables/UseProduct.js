'use strict';
import { ref, computed, watch } from 'vue';

export function useProduct(product) {

    const quantity = ref(product.orderDetails ?
        product.orderDetails.quantityOrdered : 0);

    function priceWithDiscount() {
        const priceDiscount = product.price * product.discount;
        return product.price - priceDiscount;
    }

    const updateQuantity = computed(function() {
        return priceWithDiscount() * quantity.value;
    });

    watch(quantity, (newQuantity, oldQuantity) => {

        if(product.orderDetails)
            product.orderDetails.quantityOrdered += (newQuantity - oldQuantity);
            
        product.quantityInStock -= (newQuantity - oldQuantity);
        
    });

    return {
        quantity,
        priceWithDiscount,
        updateQuantity
    };

}
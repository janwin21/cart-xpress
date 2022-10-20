'use strict';

import _ from 'lodash';
import { reactive } from 'vue';

export function data() {

    // top 4 popular shops
    const popularShops = reactive([
        {   
            id: 0,
            backgroundImagePath: '/images/sample-shops/sample-shop-2.jpg'
        },
        {   
            id: 1,
            backgroundImagePath: '/images/sample-shops/sample-shop-3.webp'
        },
        {   
            id: 2,
            backgroundImagePath: '/images/sample-shops/sample-shop-1.jpg'
        },
        {   
            id: 3,
            backgroundImagePath: '/images/sample-shops/sample-shop-4.png'
        }
    ]);

    // filtered categories
    const filteredCategories = _.filter([
        {
            id: 0,
            name: 'car',
            imagePath: '/images/sample-categories/car.jpg',
            products: [
                {
                    id: 0,
                    name: 'f 01',
                    overallRating: 5,
                    price: 90,
                    discount: 0.45,
                    itemSold: 15,
                    createdBy: new Date("2020-01-12"),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 0 }
                },
                {
                    id: 1,
                    name: 'a 01',
                    overallRating: 3,
                    price: 35,
                    discount: 0.45,
                    itemSold: 0,
                    createdBy: new Date("2018-02-01"),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 2,
                    name: 'z 01',
                    overallRating: 1.5,
                    price: 110,
                    discount: 0.45,
                    itemSold: 12,
                    createdBy: new Date("2021-10-29"),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 1 }
                }
            ]
        },
        {
            id: 1,
            name: 'kitchen',
            imagePath: '/images/sample-categories/kitchen.jpg',
            products: []
        },
        {
            id: 2,
            name: 'bike',
            imagePath: '/images/sample-categories/bike.jpg',
            products: []
        },
        {
            id: 3,
            name: 'tools',
            imagePath: '/images/sample-categories/tools.webp',
            products: [
                {
                    id: 0,
                    name: 't 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 21,
                    createdBy: new Date("2021-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 1,
                    name: 'q 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 100,
                    createdBy: new Date("2022-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 2,
                    name: 'o 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 22,
                    createdBy: new Date("2023-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-3.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 3,
                    name: 't 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 90,
                    createdBy: new Date("2020-08-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 4,
                    name: 'q 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 45,
                    createdBy: new Date("2020-07-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-5.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 5,
                    name: 'o 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 11,
                    createdBy: new Date("2020-06-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-6.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 6,
                    name: 'p 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 45,
                    createdBy: new Date("2020-01-08").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 7,
                    name: 'a 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 62,
                    createdBy: new Date("2020-01-09").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 2 }
                }
            ]
        },
        {
            id: 4,
            name: 'appliances',
            imagePath: '/images/sample-categories/appliances.webp',
            products: []
        },
        {
            id: 5,
            name: 'toy',
            imagePath: '/images/sample-categories/toy.jpg',
            products: [
                {
                    id: 0,
                    name: 'a 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 11,
                    createdBy: new Date("2020-05-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 1,
                    name: 'k 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 78,
                    createdBy: new Date("2020-04-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 2,
                    name: 'l 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 24,
                    createdBy: new Date("2020-08-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 3,
                    name: 'y 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 87,
                    createdBy: new Date("2020-01-11").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 4,
                    name: 't 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 67,
                    createdBy: new Date("2020-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 5,
                    name: 'e 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 55,
                    createdBy: new Date("2020-01-08").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 3 }
                },
                {
                    id: 6,
                    name: 'w 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 34,
                    createdBy: new Date("2022-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 4 }
                },
                {
                    id: 7,
                    name: 'u 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 12,
                    createdBy: new Date("2021-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 8,
                    name: 'p 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 90,
                    createdBy: new Date("2019-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 0 }
                },
                {
                    id: 9,
                    name: 'd 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 57,
                    createdBy: new Date("2020-02-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 0 }
                },
                {
                    id: 10,
                    name: 'f 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 33,
                    createdBy: new Date("2020-11-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 11,
                    name: 'a 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 12,
                    createdBy: new Date("2020-09-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 2 }
                },
                {
                    id: 12,
                    name: 's 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 11,
                    createdBy: new Date("2020-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-4.jpg',
                    shop: { id: 4 }
                },
                {
                    id: 13,
                    name: 'd 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 67,
                    createdBy: new Date("2020-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-2.jpg',
                    shop: { id: 1 }
                },
                {
                    id: 14,
                    name: 'w 01',
                    overallRating: 4.5,
                    price: 100.5,
                    discount: 0.45,
                    itemSold: 34,
                    createdBy: new Date("2020-01-12").getTime(),
                    quantityInStock: 25,
                    imagePath: '/images/sample-products/product-1.jpg',
                    shop: { id: 3 }
                }]
        }
    ], category => category.products.length > 0 );

    // products for each category
    const categoriesWithProducts = reactive(filteredCategories);

    // products in a cart
    const productsInACart = reactive([
        {
            id: 0,
            name: 'the first product',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            orderDetails: { quantityOrdered: 5 }
        },
        {
            id: 1,
            name: 'product 01',
            price: 5445,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-3.jpg',
            orderDetails: { quantityOrdered: 9 }
        },
        {
            id: 2,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-4.jpg',
            orderDetails: { quantityOrdered: 5 }
        },
        {
            id: 3,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            orderDetails: { quantityOrdered: 15 }
        },
        {
            id: 4,
            name: 'product 01',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-6.jpg',
            orderDetails: { quantityOrdered: 40 }
        },
        {
            id: 5,
            name: 'product 05',
            price: 55,
            quantityInStock: 12,
            overallRating: 4.5,
            discount: 0.4,
            description: 'this is a description of sample number 1',
            imagePath: '/images/sample-products/product-1.jpg',
            orderDetails: { quantityOrdered: 12 }
        }
    ]);

    // get all the products from a random category
    const productsInRandomCategory = () => {
        return reactive(_.sample(filteredCategories));
    };

    return {
        popularShops,
        categoriesWithProducts,
        productsInACart,
        productsInRandomCategory
    };

}
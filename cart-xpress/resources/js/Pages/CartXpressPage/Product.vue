<template>

    <CartXpressAppLayout>

        <!-------------------------------- Shop Main Content START -->
        <div class="product-content container-fluid pt-5 bg-opaque-xpress-black-200">

            <ProductDetails :product="product" />

            <ShopDetails :shop="product.shop" />

            <ReviewForm :product="product" />

            <ProductReviews :reviews="product.reviews" />

        </div>
        <!---------- Product Main Content END -->

    </CartXpressAppLayout>
</template>

<script setup>
    import { reactive, provide } from 'vue';

    // main components
    import CartXpressAppLayout from '../CartXpressAppLayout.vue';
    import ProductDetails from '../../CartXpressLayout/ProductLayout/ProductDetails.vue';
    import ShopDetails from '../../CartXpressLayout/ProductLayout/ShopDetails.vue';
    import ReviewForm from '../../CartXpressLayout/ProductLayout/ReviewForm.vue';
    import ProductReviews from '../../CartXpressLayout/ProductLayout/ProductReviews.vue';

    // actions & composables
    import { dynamicSort } from '../../Composables/DynamicSort';

    const { property, orderedThrough, dynamicSortBy } = dynamicSort();

    // DYNAMIC SORTS
    provide('property', property);
    provide('orderedThrough', orderedThrough);
    provide('dynamicSortBy', dynamicSortBy);

    const product = reactive({
        id: 0,
        name: 'Product 01',
        createdAt: new Date(),
        price: 150,
        size: 3,
        discount: 0.25,
        durationOfDeliveryByHour: 4,
        quantityInStock: 80,
        imagePath: '/images/sample-products/product-1.jpg',
        overallRating: 4.3,
        countReviews: 67,
        totalPriceSold: 14000,

        category: { 
            id: 0,
            name: 'category name'
        },

        shop: {
            id: 0,
            name: 'Shop 12232312',
            city: 'Paranaque',
            state: 'Metro Manila',
            country: 'Philippines',
            email: 'shop@email.com',
            postalCode: '1764',
            phone: '1234567890',
            addressLine1: 'adressline1 1234566899',
            addressLine2: 'adressline2 097531',

            mainVendor: {
                id: 0,
                firstName: 'myFirstame',
                lastName: 'myLastName',
                profileImagePath: '/images/alphabetical-profile/a-profile.jpg'
            }

        },

        reviews: [
            {
                id: 0,
                rating: 4.2,
                content: "My content 01: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                postedAt: new Date('2020-10-10'),
                createdBy: {
                    id: 0,
                    profileImagePath: '/images/alphabetical-profile/a-profile.jpg',
                    firstName: 'firstName 01',
                    lastName: 'lastName 01'
                },

                replies: [
                    {
                        id: 0,
                        content: 'My reply 01: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2021-10-07'),
                        createdBy: {
                            id: 0,
                            firstName: 'replay firstName 01',
                            lastName: 'replay lastName 01',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    },
                    {
                        id: 2,
                        content: 'My reply 03: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2018-03-11'),
                        createdBy: {
                            id: 2,
                            firstName: 'replay firstName 03',
                            lastName: 'replay lastName 03',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    },
                    {
                        id: 1,
                        content: 'My reply 02: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2019-09-07'),
                        createdBy: {
                            id: 1,
                            firstName: 'replay firstName 02',
                            lastName: 'replay lastName 02',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    }
                ]
            },
            {
                id: 1,
                rating: 3,
                content: "My content 02: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                postedAt: new Date('2021-08-08'),
                createdBy: {
                    id: 1,
                    profileImagePath: '/images/alphabetical-profile/a-profile.jpg',
                    firstName: 'firstName 02',
                    lastName: 'lastName 02'
                },

                replies: [
                    {
                        id: 0,
                        content: 'My reply 01: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2021-10-07'),
                        createdBy: {
                            id: 0,
                            firstName: 'replay firstName 01',
                            lastName: 'replay lastName 01',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    },
                    {
                        id: 2,
                        content: 'My reply 03: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2018-03-11'),
                        createdBy: {
                            id: 2,
                            firstName: 'replay firstName 03',
                            lastName: 'replay lastName 03',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    },
                    {
                        id: 1,
                        content: 'My reply 02: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2019-09-07'),
                        createdBy: {
                            id: 1,
                            firstName: 'replay firstName 02',
                            lastName: 'replay lastName 02',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    }
                ]
            },
            {
                id: 2,
                rating: 5,
                content: "My content 03: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                postedAt: new Date('2022-03-03'),
                createdBy: {
                    id: 2,
                    profileImagePath: '/images/alphabetical-profile/a-profile.jpg',
                    firstName: 'firstName 03',
                    lastName: 'lastName 03'
                },
                
                replies: []
            },
            {
                id: 3,
                rating: 4.9,
                content: "My content 04: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                postedAt: new Date('2020-01-01'),
                createdBy: {
                    id: 3,
                    profileImagePath: '/images/alphabetical-profile/a-profile.jpg',
                    firstName: 'firstName 04',
                    lastName: 'lastName 04'
                },
                
                replies: [
                    {
                        id: 0,
                        content: 'My reply 01: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2021-10-07'),
                        createdBy: {
                            id: 0,
                            firstName: 'replay firstName 01',
                            lastName: 'replay lastName 01',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    },
                    {
                        id: 2,
                        content: 'My reply 03: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2018-03-11'),
                        createdBy: {
                            id: 2,
                            firstName: 'replay firstName 03',
                            lastName: 'replay lastName 03',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    },
                    {
                        id: 1,
                        content: 'My reply 02: saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                        replyAt: new Date('2019-09-07'),
                        createdBy: {
                            id: 1,
                            firstName: 'replay firstName 02',
                            lastName: 'replay lastName 02',
                            imagePath: '/images/alphabetical-profile/a-profile.jpg'
                        }
                    }
                ]
            }
        ]
    });

</script>

<style lang="scss" scoped>

</style>
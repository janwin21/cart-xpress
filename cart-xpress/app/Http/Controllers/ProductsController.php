<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = [
            [ 'id' => 0, 'name' => 'Category 01' ],
            [ 'id' => 1, 'name' => 'Category 02' ],
            [ 'id' => 2, 'name' => 'Category 03' ],
            [ 'id' => 3, 'name' => 'Category 04' ],
            [ 'id' => 4, 'name' => 'Category 05' ],
            [ 'id' => 5, 'name' => 'ABC 05' ],
            [ 'id' => 6, 'name' => 'ZYX 05' ],
            [ 'id' => 8, 'name' => 'STR 05' ]
        ];

        $yourShops = [
            [
                'id' => 0,
                'name' => 'my shop 01',
                'backgorundImagePath' => '/images/sample-shops/sample-shop-1.jpg'
            ],
            [
                'id' => 1,
                'name' => 'my shop 02',
                'backgorundImagePath' => '/images/sample-shops/sample-shop-2.jpg'
            ],
            [
                'id' => 2,
                'name' => 'my shop 03',
                'backgorundImagePath' => '/images/sample-shops/sample-shop-3.webp'
            ],
            [
                'id' => 3,
                'name' => 'my shop 04',
                'backgorundImagePath' => '/images/sample-shops/sample-shop-4.png'
            ]
        ];

        return inertia('CartXpressPage/ProductForm', [
            'categories' => $categories,
            'yourShops' => $yourShops
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        dd($request, $request->file('imagePath'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = [
            'id' => 0,
            'name' => 'Product 01',
            'createdAt' => new Carbon(),
            'price' => 150,
            'size' => 3,
            'discount' => 0.25,
            'durationOfDeliveryByHour' => 4,
            'quantityInStock' => 80,
            'imagePath' => '/images/sample-products/product-1.jpg',
            'overallRating' => 4.3,
            'countReviews' => 67,
            'totalPriceSold' => 14000,
    
            'category' => [ 
                'id' => 0,
                'name' => 'category name'
            ],
    
            'shop' => [
                'id' => 0,
                'name' => 'Shop 12232312',
                'city' => 'Paranaque',
                'state' => 'Metro Manila',
                'country' => 'Philippines',
                'email' => 'shop@email.com',
                'postalCode' => '1764',
                'phone' => '1234567890',
                'addressLine1' => 'adressline1 1234566899',
                'addressLine2' => 'adressline2 097531',
    
                'mainVendor' => [
                    'id' => 0,
                    'firstName' => 'myFirstame',
                    'lastName' => 'myLastName',
                    'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg'
                ]
    
            ],
    
            'reviews' => [
                [
                    'id' => 0,
                    'rating' => 4.2,
                    'content' => "My content 01 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                    'postedAt' => new Carbon('2020-10-10'),
                    'createdBy' => [
                        'id' => 0,
                        'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
                        'firstName' => 'firstName 01',
                        'lastName' => 'lastName 01'
                    ],
    
                    'replies' => [
                        [
                            'id' => 0,
                            'content' => 'My reply 01 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2021-10-07'),
                            'createdBy' => [
                                'id' => 0,
                                'firstName' => 'replay firstName 01',
                                'lastName' => 'replay lastName 01',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ],
                        [
                            'id' => 2,
                            'content' => 'My reply 03 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2018-03-11'),
                            'createdBy' => [
                                'id' => 2,
                                'firstName' => 'replay firstName 03',
                                'lastName' => 'replay lastName 03',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ],
                        [
                            'id' => 1,
                            'content' => 'My reply 02 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2019-09-07'),
                            'createdBy' => [
                                'id' => 1,
                                'firstName' => 'replay firstName 02',
                                'lastName' => 'replay lastName 02',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 1,
                    'rating' => 3,
                    'content' => "My content 02 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                    'postedAt' => new Carbon('2021-08-08'),
                    'createdBy' => [
                        'id' => 1,
                        'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
                        'firstName' => 'firstName 02',
                        'lastName' => 'lastName 02'
                    ],
    
                    'replies' => [
                        [
                            'id' => 0,
                            'content' => 'My reply 01 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2021-10-07'),
                            'createdBy' => [
                                'id' => 0,
                                'firstName' => 'replay firstName 01',
                                'lastName' => 'replay lastName 01',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ],
                        [
                            'id' => 2,
                            'content' => 'My reply 03 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2018-03-11'),
                            'createdBy' => [
                                'id' => 2,
                                'firstName' => 'replay firstName 03',
                                'lastName' => 'replay lastName 03',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ],
                        [
                            'id' => 1,
                            'content' => 'My reply 02 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2019-09-07'),
                            'createdBy' => [
                                'id' => 1,
                                'firstName' => 'replay firstName 02',
                                'lastName' => 'replay lastName 02',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 2,
                    'rating' => 5,
                    'content' => "My content 03 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                    'postedAt' => new Carbon('2022-03-03'),
                    'createdBy' => [
                        'id' => 2,
                        'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
                        'firstName' => 'firstName 03',
                        'lastName' => 'lastName 03'
                    ],
                    
                    'replies' => []
                ],
                [
                    'id' => 3,
                    'rating' => 4.9,
                    'content' => "My content 04 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N",
                    'postedAt' => new Carbon('2020-01-01'),
                    'createdBy' => [
                        'id' => 3,
                        'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
                        'firstName' => 'firstName 04',
                        'lastName' => 'lastName 04'
                    ],
                    
                    'replies' => [
                        [
                            'id' => 0,
                            'content' => 'My reply 01 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2021-10-07'),
                            'createdBy' => [
                                'id' => 0,
                                'firstName' => 'replay firstName 01',
                                'lastName' => 'replay lastName 01',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ],
                        [
                            'id' => 2,
                            'content' => 'My reply 03 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2018-03-11'),
                            'createdBy' => [
                                'id' => 2,
                                'firstName' => 'replay firstName 03',
                                'lastName' => 'replay lastName 03',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ],
                        [
                            'id' => 1,
                            'content' => 'My reply 02 => saskm asns amsa amsmas msakasmkaSMADJISAJAS NAKAS N',
                            'replyAt' => new Carbon('2019-09-07'),
                            'createdBy' => [
                                'id' => 1,
                                'firstName' => 'replay firstName 02',
                                'lastName' => 'replay lastName 02',
                                'imagePath' => '/images/alphabetical-profile/a-profile.jpg'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return inertia('CartXpressPage/Product', [
            'product' => $product
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

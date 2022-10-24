<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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

        return inertia('CartXpressPage/CategoryForm', [
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
        
        dd($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = [
            'id' => 0,
            'name' => 'category name number 1',
            'description' => 'this is a description for categories',
            'products' => [
                [
                    'id' => 0,
                    'name' => 'ABC',
                    'createdAt' => new Carbon(2020, 1, 4),
                    'price' => 150,
                    'size' => 3,
                    'discount' => 0.25,
                    'durationOfDeliveryByHour' => 4,
                    'quantityInStock' => 80,
                    'imagePath' => '/images/sample-products/product-1.jpg',
                    'overallRating' => 4.1,
                    'countReviews' => 67,
                    'totalPriceSold' => 14000,
    
                    'category' => [ 
                        'id' => 0,
                        'name' => 'category name'
                    ],
    
                    'orderDetails' => [
                        'quantityOrdered' => 7
                    ]
                ],
                [
                    'id' => 1,
                    'name' => 'EFD',
                    'createdAt' => new Carbon(2019, 5, 5),
                    'price' => 85,
                    'size' => 3,
                    'discount' => 0.25,
                    'durationOfDeliveryByHour' => 4,
                    'quantityInStock' => 80,
                    'imagePath' => '/images/sample-products/product-2.jpg',
                    'overallRating' => 4.3,
                    'countReviews' => 67,
                    'totalPriceSold' => 12000,
    
                    'category' => [ 
                        'id' => 0,
                        'name' => 'category name'
                    ],
    
                    'orderDetails' => [
                        'quantityOrdered' => 8
                    ]
                ],
                [
                    'id' => 2,
                    'name' => 'XYZ',
                    'createdAt' => new Carbon(2019, 10, 10),
                    'price' => 1200,
                    'size' => 3,
                    'discount' => 0.25,
                    'durationOfDeliveryByHour' => 4,
                    'quantityInStock' => 80,
                    'imagePath' => '/images/sample-products/product-2.jpg',
                    'overallRating' => 5,
                    'countReviews' => 67,
                    'totalPriceSold' => 4000,
    
                    'category' => [ 
                        'id' => 0,
                        'name' => 'category name'
                    ],
    
                    'orderDetails' => [
                        'quantityOrdered' => 4
                    ]
                ]
            ]

        ];
        
        return inertia('CartXpressPage/Category', [
            'category' => $category
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

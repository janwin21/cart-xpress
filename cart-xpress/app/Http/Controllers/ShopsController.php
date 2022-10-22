<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $shop = [
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
            'backgroundImagePath' => '/images/sample-shops/sample-shop-1.jpg',
    
            'mainVendor' => [
                'id' => 0,
                'firstName' => 'myFirstame',
                'lastName' => 'myLastName',
                'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg'
            ]
        ];

        $categoriesWithProducts = [
            [
                'id' => 0, 
                'name' => 'casr', 
                'imagePath' => '/images/sample-categories/car.jpg',
                'products' => [
                    [ 
                        'id' => 0,
                        'name' => 'f 01',
                        'overallRating' => 5,
                        'price' => 90,
                        'discount' => 0.45,
                        'itemSold' => 15,
                        'createdAt' => new Carbon(),
                        'quantityInStock' => 25,
                        'imagePath' => '/images/sample-products/product-4.jpg',
                        'shop' => [ 'id' => 0 ]
                    ],
                    [
                        'id' => 2,
                        'name' => 'z 01',
                        'overallRating' => 1.5,
                        'price' => 110,
                        'discount' => 0.45,
                        'itemSold' => 12,
                        'createdAt' => new Carbon(),
                        'quantityInStock' => 25,
                        'imagePath' => '/images/sample-products/product-1.jpg',
                        'shop' => [ 'id' => 1 ]
                    ],
                ]
            ], 
            [
                'id' => 2, 
                'name' => 'train', 
                'imagePath' => '/images/sample-categories/toy.jpg',
                'products' => [
                    [ 
                        'id' => 0,
                        'name' => 'f 01',
                        'overallRating' => 5,
                        'price' => 90,
                        'discount' => 0.45,
                        'itemSold' => 15,
                        'createdAt' => new Carbon(),
                        'quantityInStock' => 25,
                        'imagePath' => '/images/sample-products/product-4.jpg',
                        'shop' => [ 'id' => 0 ]
                    ]
                ]
            ], 
            [
                'id' => 1, 
                'name' => 'train', 
                'imagePath' => '/images/sample-categories/car.jpg',
                'products' => [
                    [ 
                        'id' => 0,
                        'name' => 'f 01',
                        'overallRating' => 5,
                        'price' => 90,
                        'discount' => 0.45,
                        'itemSold' => 15,
                        'createdAt' => new Carbon(),
                        'quantityInStock' => 25,
                        'imagePath' => '/images/sample-products/product-4.jpg',
                        'shop' => [ 'id' => 0 ]
                    ]
                ]
            ]
        ];
        
        return inertia('CartXpressPage/Shop', [
            'shop' => $shop,
            'categoriesWithProducts' => $categoriesWithProducts
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

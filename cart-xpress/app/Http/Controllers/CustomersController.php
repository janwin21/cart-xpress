<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        
        $user = [
            'id' => 0,
            'firstName' => 'myFirstName',
            'lastName' => 'myLastName',
            'phone' => 'phone',
            'email' => 'user@gamil.com',
            'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
            'backgroundImagePath' => '/images/alphabetical-backgrounds/a-profile-background.jpg',
            'isHired' => false,
            'isVendor' => true
        ];

        $userProfile = [
            'addressLine1' => 'addressLine1',
            'addressLine2' => 'addressLine2',
            'city' => 'city',
            'states' => 'states',
            'postalCode' => 'postalCode',
            'country' => 'country'
        ];

        $onCartOrders = [
            [
                'id' => 0,
                'orderedDate' => new Carbon(),
                'products' =>  [
                    [
                        'id' => 0,
                        'name' => 'the first product',
                        'price' => 55,
                        'quantityInStock' => 12,
                        'overallRating' => 4.5,
                        'discount' => 0.4,
                        'description' => 'this is a description of sample number 1',
                        'imagePath' => '/images/sample-products/product-1.jpg',
                        'orderDetails' => [ 'quantityOrdered' => 5 ]
                    ],
                    [
                        'id' => 1,
                        'name' => 'product 01',
                        'price' => 5445,
                        'quantityInStock' => 12,
                        'overallRating' => 4.5,
                        'discount' => 0.4,
                        'description' => 'this is a description of sample number 1',
                        'imagePath' => '/images/sample-products/product-3.jpg',
                        'orderDetails' => [ 'quantityOrdered' => 9 ]
                    ],
                    [
                        'id' => 2,
                        'name' => 'product 01',
                        'price' => 55,
                        'quantityInStock' => 12,
                        'overallRating' => 4.5,
                        'discount' => 0.4,
                        'description' => 'this is a description of sample number 1',
                        'imagePath' => '/images/sample-products/product-4.jpg',
                        'orderDetails' => [ 'quantityOrdered' => 5 ]
                    ]
                ]
            ]
        ];

        $pendingOrders = [
            [
                'id' => 0,
                'orderedDate' => new Carbon(),
                'products' =>  [
                    [
                        'id' => 0,
                        'name' => 'the first product',
                        'price' => 55,
                        'quantityInStock' => 12,
                        'overallRating' => 4.5,
                        'discount' => 0.4,
                        'description' => 'this is a description of sample number 1',
                        'imagePath' => '/images/sample-products/product-1.jpg',
                        'orderDetails' => [ 'quantityOrdered' => 5 ]
                    ]
                ]
            ]
        ];

        $deliveredOrders = [
            [
                'id' => 0,
                'orderedDate' => new Carbon(),
                'products' =>  [
                    [
                        'id' => 0,
                        'name' => 'the first product',
                        'price' => 55,
                        'quantityInStock' => 12,
                        'overallRating' => 4.5,
                        'discount' => 0.4,
                        'description' => 'this is a description of sample number 1',
                        'imagePath' => '/images/sample-products/product-1.jpg',
                        'orderDetails' => [ 'quantityOrdered' => 5 ]
                    ]
                ]
            ]
        ];

        $cancelledOrders = [
            [
                'id' => 0,
                'orderedDate' => new Carbon(),
                'products' =>  [
                    [
                        'id' => 0,
                        'name' => 'the first product',
                        'price' => 55,
                        'quantityInStock' => 12,
                        'overallRating' => 4.5,
                        'discount' => 0.4,
                        'description' => 'this is a description of sample number 1',
                        'imagePath' => '/images/sample-products/product-1.jpg',
                        'orderDetails' => [ 'quantityOrdered' => 5 ]
                    ]
                ]
            ]
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

        $restricted = false;

        if($user['isVendor']) {
            return inertia('CartXpressPage/VendorProfile', [
                'user' => $user,
                'userProfile' => $userProfile,
                'onCartOrders' => $onCartOrders,
                'pendingOrders' => $pendingOrders,
                'deliveredOrders' => $deliveredOrders,
                'cancelledOrders' => $cancelledOrders,
                'yourShops' => $yourShops,
                'restricted' => $restricted
            ]);
        } else {
            return inertia('CartXpressPage/CustomerProfile', [
                'user' => $user,
                'userProfile' => $userProfile,
                'onCartOrders' => $onCartOrders,
                'pendingOrders' => $pendingOrders,
                'deliveredOrders' => $deliveredOrders,
                'cancelledOrders' => $cancelledOrders,
                'restricted' => $restricted
            ]);
        }

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

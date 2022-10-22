<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $popularShops =  [
            [ 'id'=> 0, 'backgroundImagePath' => '/images/sample-shops/sample-shop-2.jpg'],
            [ 'id'=> 1, 'backgroundImagePath' => '/images/sample-shops/sample-shop-3.webp'],
            [ 'id'=> 2, 'backgroundImagePath' => '/images/sample-shops/sample-shop-1.jpg'],
            [ 'id'=> 3, 'backgroundImagePath' => '/images/sample-shops/sample-shop-4.png']
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
                    ]
                ]
            ], 
            [
                'id' => 2, 
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

        $productsInACart = [
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
                'id' => 2,
                'name' => 'product 01',
                'price' => 55,
                'quantityInStock' => 12,
                'overallRating' => 4.5,
                'discount' => 0.4,
                'description' => 'this is a description of sample number 1',
                'imagePath' => '/images/sample-products/product-4.jpg',
                'orderDetails' => [ 'quantityOrdered' => 5 ]
            ],
            [
                'id' => 3,
                'name' => 'product 01',
                'price' => 55,
                'quantityInStock' => 12,
                'overallRating' => 4.5,
                'discount' => 0.4,
                'description' => 'this is a description of sample number 2',
                'imagePath' => '/images/sample-products/product-1.jpg',
                'orderDetails' => [ 'quantityOrdered' => 15 ]
            ],
            [
                'id' => 4,
                'name' => 'product 01',
                'price' => 55,
                'quantityInStock' => 12,
                'overallRating' => 4.5,
                'discount' => 0.4,
                'description' => 'this is a description of sample number 3',
                'imagePath' => '/images/sample-products/product-6.jpg',
                'orderDetails' => [ 'quantityOrdered' => 40 ]
            ],
            [
                'id' => 5,
                'name' => 'product 05',
                'price' => 55,
                'quantityInStock' => 12,
                'overallRating' => 4.5,
                'discount' => 0.4,
                'description' => 'this is a description of sample number 4',
                'imagePath' => '/images/sample-products/product-1.jpg',
                'orderDetails' => [ 'quantityOrdered' => 12 ]
            ]
        ];

        return inertia('CartXpressPage/Home', [
            'popularShops' => $popularShops,
            'categoriesWithProducts' => $categoriesWithProducts,
            'productsInACart' => $productsInACart
        ]);

    }

    /**
     * Display a login page.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {

        return inertia('CartXpressPage/Login');

    }

    /**
     * Display a register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {

        return inertia('CartXpressPage/Register');

    }

    /**
     * Display a Customer & Vendor Profile Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        $user = [
            'id' => 0,
            'email' => 'user@gamil.com',
            'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
            'backgroundImagePath' => '/images/alphabetical-backgrounds/a-profile-background.jpg',
            'isHired' => false,
            'isVendor' => false
        ];
        
        $userProfile = [
            'firstName' => 'myFirstName',
            'lastName' => 'myLastName',
            'addressLine1' => 'addressLine1',
            'addressLine2' => 'addressLine2',
            'phone' => 'phone',
            'city' => 'city',
            'states' => 'states',
            'country' => 'country',
            'postalCode' => 'postalCode'
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

        if($user['isVendor']) {
            return inertia('CartXpressPage/VendorProfile', [
                'user' => $user,
                'userProfile' => $userProfile,
                'onCartOrders' => $onCartOrders,
                'pendingOrders' => $pendingOrders,
                'deliveredOrders' => $deliveredOrders,
                'cancelledOrders' => $cancelledOrders
            ]);
        } else {
            return inertia('CartXpressPage/CustomerProfile', [
                'user' => $user,
                'userProfile' => $userProfile,
                'onCartOrders' => $onCartOrders,
                'pendingOrders' => $pendingOrders,
                'deliveredOrders' => $deliveredOrders,
                'cancelledOrders' => $cancelledOrders
            ]);
        }

    }

}

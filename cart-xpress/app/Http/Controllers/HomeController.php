<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Auth\LoginRequest;
use App\Http\Resources\CategoriesWithProductsResource;
use App\Http\Resources\PopularProductsResource;
use App\Http\Resources\PopularShopsResource;
use App\Http\Resources\TopCategoriesResource;
use App\Http\Resources\YourProfileResource;
use App\Http\Resources\YourShopsResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Traits\UseUpload;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Shops;

class HomeController extends Controller
{
    use UseUpload;

    function __construct()
    {
        
        $this->middleware('redirect.home')
            ->except(['index', 'login', 'register']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display top 4 shops
        $popularShops = PopularShopsResource::collection(
            Shops::orderBy('created_at', 'DESC')->limit(4)->get());

        // display all categories with products contain
        $categoriesWithProducts = CategoriesWithProductsResource::collection(Categories::all());

        // top 10 categories
        $topCategories = TopCategoriesResource::collection(
            Categories::orderBy('created_at', 'DESC')->limit(10)->get());

        // display top 6 products
        $popularProducts = PopularProductsResource::collection(
            Products::orderBy('created_at', 'DESC')->limit(6)->get());

        $shops = [
            [
                'id' => 0,
                'name' => 'shopName XYZ',
    
                'products' => [
                    [
                        'id' => 0,
                        'name' => 'Product 01',
                        'createdAt' => new Carbon(),
                        'price' => 200,
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
    
                        'orderDetails' => [
                            'quantityOrdered' => 7
                        ]
                    ],
                    [
                        'id' => 1,
                        'name' => 'Product 01',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-2.jpg',
                        'overallRating' => 4.3,
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
                        'id' => 2,
                        'name' => 'Product 01',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-2.jpg',
                        'overallRating' => 4.3,
                        'countReviews' => 67,
                        'totalPriceSold' => 14000,
    
                        'category' => [ 
                            'id' => 0,
                            'name' => 'category name'
                        ],
    
                        'orderDetails' => [
                            'quantityOrdered' => 7
                        ]
                    ]
                ]
            ],
            [
                'id' => 0,
                'name' => 'shopName ABC',
    
                'products' => [
                    [
                        'id' => 0,
                        'name' => 'Product 0221',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-6.jpg',
                        'overallRating' => 4.3,
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
                        'name' => 'Product1212ewqwewe',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-4.jpg',
                        'overallRating' => 4.3,
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
                        'id' => 2,
                        'name' => 'Product thisdin',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-5.jpg',
                        'overallRating' => 4.3,
                        'countReviews' => 67,
                        'totalPriceSold' => 14000,
    
                        'category' => [ 
                            'id' => 0,
                            'name' => 'category name'
                        ],
    
                        'orderDetails' => [
                            'quantityOrdered' => 7
                        ]
                    ]
                ]
            ]
        ];

        return inertia('CartXpressPage/Home', [
            'popularShops' => $popularShops,
            'categoriesWithProducts' => $categoriesWithProducts,
            'shops' => $shops,
            'topCategories' => $topCategories,
            'popularProducts' => $popularProducts,
            'hasLogin' => Auth::check() 
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
     * login.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginAccount(Request $request)
    {

        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->route('home');

    }

    /**
     * logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        $request->session()->flush();

        return redirect()->route('home');

    }

    /**
     * Display a Customer & Vendor Profile Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        // temp variables
        $tempUser = Auth::user();

        $user = new YourProfileResource(Auth::user());

        if($user->isHired) {

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
                ],
                [
                    'id' => 1,
                    'orderedDate' => new Carbon(),
                    'products' =>  [
                        [
                            'id' => 0,
                            'name' => 'the secind product',
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

            $customers = [
                [
                    'id' => 0,
                    'firstName' => 'first abc',
                    'lastName' => 'last abc',
                    'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/a-profile-background.jpg',
                    'createdAt' => new Carbon(2002, 8, 1),
                ],
                [
                    'id' => 1,
                    'firstName' => 'xzy sasasa',
                    'lastName' => 'gsdosdo',
                    'profileImagePath' => '/images/alphabetical-profile/c-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/d-profile-background.jpg',
                    'createdAt' => new Carbon(2016, 5, 2)
                ],
                [
                    'id' => 2,
                    'firstName' => 'asadsd',
                    'lastName' => 'asdsad',
                    'profileImagePath' => '/images/alphabetical-profile/e-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/r-profile-background.jpg',
                    'createdAt' => new Carbon(2022, 2, 10)
                ]
            ];

            $employees = [
                [
                    'id' => 0,
                    'firstName' => 'employee first abc',
                    'lastName' => 'employee last abc',
                    'profileImagePath' => '/images/alphabetical-profile/m-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/t-profile-background.jpg',
                    'createdAt' => new Carbon(2002, 8, 1),
                ],
                [
                    'id' => 1,
                    'firstName' => 'employee xzy sasasa',
                    'lastName' => 'employee gsdosdo',
                    'profileImagePath' => '/images/alphabetical-profile/g-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/x-profile-background.jpg',
                    'createdAt' => new Carbon(2016, 5, 2)
                ],
                [
                    'id' => 2,
                    'firstName' => 'employee asadsd',
                    'lastName' => 'employee asdsad',
                    'profileImagePath' => '/images/alphabetical-profile/e-profile.jpg',
                    'backgroundImagePath' => 'images/alphabetical-backgrounds/e-profile-background.jpg',
                    'createdAt' => new Carbon(2022, 2, 10)
                ]
            ];

            $needToAssignCustomers = [
                [
                    'id' => 0,
                    'firstName' => 'first abc',
                    'lastName' => 'last abc',
                    'profileImagePath' => '/images/alphabetical-profile/a-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/a-profile-background.jpg',
                    'createdAt' => new Carbon(2002, 8, 1),
                ],
                [
                    'id' => 1,
                    'firstName' => 'xzy sasasa',
                    'lastName' => 'gsdosdo',
                    'profileImagePath' => '/images/alphabetical-profile/c-profile.jpg',
                    'backgroundImagePath' => '/images/alphabetical-backgrounds/d-profile-background.jpg',
                    'createdAt' => new Carbon(2016, 5, 2)
                ],
                [
                    'id' => 2,
                    'firstName' => 'asadsd',
                    'lastName' => 'asdsad',
                    'profileImagePath' => '/images/alphabetical-profile/e-profile.jpg',
                    'backgroundImagePath' => 'images/alphabetical-backgrounds/t-profile-background.jpg',
                    'createdAt' => new Carbon(2022, 2, 10)
                ]
            ];

            $shops = [
                [
                    'id' => 0,
                    'name' => 'my shop 01',
                    'createdAt' => new Carbon(2002, 01, 01),
                    'backgorundImagePath' => '/images/sample-shops/sample-shop-1.jpg',
                    'city' => 'city 01'
                ],
                [
                    'id' => 1,
                    'name' => 'my shop 02',
                    'createdAt' => new Carbon(2013, 01, 01),
                    'backgorundImagePath' => '/images/sample-shops/sample-shop-2.jpg',
                    'city' => 'city 12'
                ],
                [
                    'id' => 2,
                    'name' => 'my shop 03',
                    'createdAt' => new Carbon(20014, 01, 01),
                    'backgorundImagePath' => '/images/sample-shops/sample-shop-3.webp',
                    'city' => 'ZYX city'
                ],
                [
                    'id' => 3,
                    'name' => 'my shop 04',
                    'createdAt' => new Carbon(2015, 01, 01),
                    'backgorundImagePath' => '/images/sample-shops/sample-shop-4.png',
                    'city' => 'sasasasas'
                ]
            ];
            
            return inertia('CartXpressPage/EmployeeProfile', [
                'user' => $user,
                'pendingOrders' => $pendingOrders,
                'customers' => $customers,
                'shops' => $shops,
                'employees' => $employees,
                'needToAssignCustomers' => $needToAssignCustomers,
                'hasLogin' => Auth::check() 
            ]);

        } else {
        
            $userProfile = User::find($tempUser->id)->customer;

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

            $restricted = false;
            
            if($user->isVendor) {

                $yourShops = YourShopsResource::collection($userProfile->shops);

                return inertia('CartXpressPage/VendorProfile', [
                    'user' => $user,
                    'userProfile' => $userProfile,
                    'onCartOrders' => $onCartOrders,
                    'pendingOrders' => $pendingOrders,
                    'deliveredOrders' => $deliveredOrders,
                    'cancelledOrders' => $cancelledOrders,
                    'yourShops' => $yourShops,
                    'restricted' => $restricted,
                    'hasLogin' => Auth::check() 
                ]);
            } else {
                return inertia('CartXpressPage/CustomerProfile', [
                    'user' => $user,
                    'userProfile' => $userProfile,
                    'onCartOrders' => $onCartOrders,
                    'pendingOrders' => $pendingOrders,
                    'deliveredOrders' => $deliveredOrders,
                    'cancelledOrders' => $cancelledOrders,
                    'restricted' => $restricted,
                    'hasLogin' => Auth::check() 
                ]);
            }

        }

    }

    /**
     * Display a Customer Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function visitUserCustomer($id) {

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

        $restricted = true;

        return inertia('CartXpressPage/CustomerProfile', [
            'user' => $user,
            'userProfile' => $userProfile,
            'restricted' => $restricted
        ]);

    }

    /**
     * Display a checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {

        $shops = [
            [
                'id' => 0,
                'name' => 'shopName XYZ',
    
                'products' => [
                    [
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
    
                        'orderDetails' => [
                            'quantityOrdered' => 7
                        ]
                    ],
                    [
                        'id' => 1,
                        'name' => 'Product 01',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-2.jpg',
                        'overallRating' => 4.3,
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
                        'id' => 2,
                        'name' => 'Product 01',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-2.jpg',
                        'overallRating' => 4.3,
                        'countReviews' => 67,
                        'totalPriceSold' => 14000,
    
                        'category' => [ 
                            'id' => 0,
                            'name' => 'category name'
                        ],
    
                        'orderDetails' => [
                            'quantityOrdered' => 7
                        ]
                    ]
                ]
            ],
            [
                'id' => 0,
                'name' => 'shopName ABC',
    
                'products' => [
                    [
                        'id' => 0,
                        'name' => 'Product 0221',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-6.jpg',
                        'overallRating' => 4.3,
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
                        'name' => 'Product1212ewqwewe',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-4.jpg',
                        'overallRating' => 4.3,
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
                        'id' => 2,
                        'name' => 'Product thisdin',
                        'createdAt' => new Carbon(),
                        'price' => 150,
                        'size' => 3,
                        'discount' => 0.25,
                        'durationOfDeliveryByHour' => 4,
                        'quantityInStock' => 80,
                        'imagePath' => '/images/sample-products/product-5.jpg',
                        'overallRating' => 4.3,
                        'countReviews' => 67,
                        'totalPriceSold' => 14000,
    
                        'category' => [ 
                            'id' => 0,
                            'name' => 'category name'
                        ],
    
                        'orderDetails' => [
                            'quantityOrdered' => 7
                        ]
                    ]
                ]
            ]
        ];

        $users = [
            [
                'id' => 0,
                'firstName' => 'A firstname',
                'lastName' => 'V lastname',
                'profileImagePath' => '/images/alphabetical-profile/b-profile.jpg',
                'addressLine1' => 'address line 1 01',
                'addressLine2' => 'address line 2 01',
                'city' => 'my city 01',
                'state' => 'my state 01',
                'postalCode' => 'my postal code 01',
                'country' => 'my country 01',
                'orders' => [ 'comment' => 'my comment 01' ]
            ],
            [
                'id' => 1,
                'firstName' => 'F firstname',
                'lastName' => 'A lastname',
                'profileImagePath' => '/images/alphabetical-profile/c-profile.jpg',
                'addressLine1' => 'address line 1 02',
                'addressLine2' => 'address line 2 02',
                'city' => 'my city 02',
                'state' => 'my state 02',
                'postalCode' => 'my postal code 02',
                'country' => 'my country 02',
                'orders' => [ 'comment' => 'my comment 02' ]
            ],
            [
                'id' => 2,
                'firstName' => 'D firstname',
                'lastName' => 'B lastname',
                'profileImagePath' => '/images/alphabetical-profile/g-profile.jpg',
                'addressLine1' => 'address line 1 03',
                'addressLine2' => 'address line 2 03',
                'city' => 'my city 03',
                'state' => 'my state 03',
                'postalCode' => 'my postal code 03',
                'country' => 'my country 03',
                'orders' => [ 'comment' => 'my comment 03' ]
            ],
            [
                'id' => 3,
                'firstName' => 'C firstname',
                'lastName' => 'A lastname',
                'profileImagePath' => '/images/alphabetical-profile/h-profile.jpg',
                'addressLine1' => 'address line 1 04',
                'addressLine2' => 'address line 2 04',
                'city' => 'my city 04',
                'state' => 'my state 04',
                'postalCode' => 'my postal code 04',
                'country' => 'my country 04',
                'orders' => [ 'comment' => 'my comment 04' ]
            ],
            [
                'id' => 4,
                'firstName' => 'janwin',
                'lastName' => 'toralba',
                'profileImagePath' => '/images/alphabetical-profile/x-profile.jpg',
                'addressLine1' => 'address line 1 05',
                'addressLine2' => 'address line 2 05',
                'city' => 'my city 05',
                'state' => 'my state 05',
                'postalCode' => 'my postal code 05',
                'country' => 'my country 05',
                'orders' => [ 'comment' => 'my comment 05' ]
            ],
            [
                'id' => 5,
                'firstName' => 'asask salslas',
                'lastName' => 'zackasas',
                'profileImagePath' => '/images/alphabetical-profile/c-profile.jpg',
                'addressLine1' => 'address line 1 06',
                'addressLine2' => 'address line 2 06',
                'city' => 'my city 06',
                'state' => 'my state 06',
                'postalCode' => 'my postal code 06',
                'country' => 'my country 06',
                'orders' => [ 'comment' => 'my comment 06' ]
            ]
        ];

        $user = [
            'id' => 0,
            'firstName' => 'A firstname XYZ',
            'lastName' => 'V lastname XYZ',
            'profileImagePath' => '/images/alphabetical-profile/b-profile.jpg',
            'addressLine1' => 'address line 1 XYZ',
            'addressLine2' => 'address line 2 XYZ',
            'city' => 'my city XYZ',
            'state' => 'my state XYZ',
            'postalCode' => 'my postal code XYZ',
            'country' => 'my country XYZ',
            'orders' => [ 'comment' => 'my comment XYZ' ]
        ];

        return inertia('CartXpressPage/Checkout', [
            'shops' => $shops,
            'users' => $users,
            'user' => $user
        ]);

    }

    /**
     * Order all checkout items.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request) {

        $request->addressLine1;
        $request->addressLine2;
        $request->city;
        $request->state;
        $request->postalCode;
        $request->country;
        $request->comment;
        $request->shops;
        
        return redirect()->route('home');
    }

}

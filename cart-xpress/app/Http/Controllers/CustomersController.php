<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrdersResource;
use App\Http\Resources\YourProfileResource;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('redirect.home');
    }
    
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

        // temp variables
        $tempUser = User::where('id', $id)->first();

        $user = new YourProfileResource($tempUser);
        
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

        $pendingOrders = OrdersResource::collection(
            Orders::where('customerID', 
                $tempUser->customer->id)
                    ->where('status', 'pending')
                    ->orderBy('orderedDate', 'DESC')->get());

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

        $restricted = true;

        if($user['isVendor']) {
            return inertia('CartXpressPage/VendorProfile', [
                'user' => $user,
                'userProfile' => $userProfile,
                'onCartOrders' => $onCartOrders,
                'pendingOrders' => $pendingOrders,
                'deliveredOrders' => $deliveredOrders,
                'cancelledOrders' => $cancelledOrders,
                'yourShops' => $yourShops,
                'hasLogin' => Auth::check(),
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
                'hasLogin' => Auth::check(),
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

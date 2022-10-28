<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Auth\LoginRequest;
use App\Http\Resources\CategoriesWithProductsResource;
use App\Http\Resources\CustomerAddressesResource;
use App\Http\Resources\OnCartShopsResource;
use App\Http\Resources\OrdersResource;
use App\Http\Resources\PopularProductsResource;
use App\Http\Resources\PopularShopsResource;
use App\Http\Resources\ShopResource;
use App\Http\Resources\TopCategoriesResource;
use App\Http\Resources\YourProfileResource;
use App\Http\Resources\YourShopsResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UseUpload;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\OrderDetails;
use App\Models\Orders;
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

        
        // display all products on-cart by shops    
        $shops = [];
        $hasLogin = Auth::check();

        if($hasLogin && !Auth::user()->isHired) {

            if(Auth::user()->customer->orders->where('status', 'on-cart')->count() != 0) {
    
                $shops = OnCartShopsResource::collection(
                    Shops::all()->filter(function($shop) {
                        return $shop->products->filter(function($product) {
                            return $product->orderDetails->where('orderID',
                                Auth::user()->customer->orders->where('status', 'on-cart')->first()->id
                            )->count() > 0;
                        })->count() > 0;
                    })
                );
    
            }
    
        }

        return inertia('CartXpressPage/Home', [
            'popularShops' => $popularShops,
            'categoriesWithProducts' => $categoriesWithProducts,
            'shops' => $shops,
            'topCategories' => $topCategories,
            'popularProducts' => $popularProducts,
            'hasLogin' => $hasLogin
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

            $customers = YourProfileResource::collection(User::where('isHired', 0)->get()->filter(
                function($user) {
                    return 
                        $user->customer->orders->where('status', 'pending')->count() > 0 &&
                        $user->customer->representatives
                            ->where('employeeID', Auth::user()->employee->id)->count() > 0;
                }
            ));
            
            $employees = YourProfileResource::collection(User::where('isHired', 1)->get());

            $needToAssignCustomers = YourProfileResource::collection(User::where('isHired', 0)->get()->filter(
                function($user) {
                    return 
                        $user->customer->orders->where('status', 'pending')->count() > 0 &&
                        $user->customer->representatives->count() <= 0;
                }
            ));

            $shops = ShopResource::collection(Shops::all());
            
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

            $onCartOrders = OrdersResource::collection(
                Orders::where('customerID', 
                    Auth::user()->customer->id)
                        ->where('status', 'on-cart')
                        ->orderBy('orderedDate', 'DESC')->get());

            $pendingOrders = OrdersResource::collection(
                Orders::where('customerID', 
                    Auth::user()->customer->id)
                        ->where('status', 'pending')
                        ->orderBy('orderedDate', 'DESC')->get());

            $deliveredOrders = OrdersResource::collection(
                Orders::where('customerID', 
                    Auth::user()->customer->id)
                        ->where('status', 'delivered')
                        ->orderBy('orderedDate', 'DESC')->get());

            $cancelledOrders = OrdersResource::collection(
                Orders::where('customerID', 
                    Auth::user()->customer->id)
                        ->where('status', 'cancelled')
                        ->orderBy('orderedDate', 'DESC')->get());

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

        if(Auth::user()->customer->orders->where('status', 'on-cart')->count() == 0)
            return redirect()->route('home');

        // display all products on-cart by shops
        $shops = OnCartShopsResource::collection(
            Shops::all()->filter(function($shop) {
                return $shop->products->filter(function($product) {
                    return $product->orderDetails->where('orderID',
                        Auth::user()->customer->orders->where('status', 'on-cart')->first()->id
                    )->count() > 0;
                })->count() > 0;
            })
        );

        $users = CustomerAddressesResource::collection(User::all());

        return inertia('CartXpressPage/Checkout', [
            'shops' => $shops,
            'users' => $users,
            'user' => new CustomerAddressesResource(Auth::user()),
            'hasLogin' => Auth::check(),
            'isHired' => Auth::user()->isHired
        ]);

    }

    /**
     * Order all checkout items.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request) 
    {

        $onCartOrder = Auth::user()->customer->orders->where('status', 'on-cart')->first();
        $yourAddress = Auth::user()->customer;

        foreach ($request->quantities as $q) {

            $orderDetail = $onCartOrder->orderDetails
                ->where('orderID', $onCartOrder->id)
                ->where('productID', $q['productID'])
                ->first();

            $orderDetail->quantityOrdered = $q['quantity'];
            $orderDetail->update();

        }

        $onCartOrder->status = 'pending';
        $onCartOrder->orderedDate = new Carbon();
        $onCartOrder->update();

        $yourAddress->addressLine1  = $request->addressLine1;
        $yourAddress->addressLine2  = $request->addressLine2;
        $yourAddress->city  = $request->city;
        $yourAddress->state  = $request->state;
        $yourAddress->postalCode  = $request->postalCode;
        $yourAddress->country  = $request->country;
        $yourAddress->update();
        
        return redirect()->route('home');
    }

}

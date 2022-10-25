<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopResource;
use App\Http\Resources\YourShopsResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Traits\UseUpload;
use App\Models\Shops;
use App\Models\User;
use App\Models\Vendors;
use Illuminate\Support\Facades\Auth;

class ShopsController extends Controller
{

    use UseUpload;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $yourShops = YourShopsResource::collection(
            User::find(Auth::user()->id)->customer->shops);

        return inertia('CartXpressPage/ShopForm', [
            'yourShops' => $yourShops,
            'hasLogin' => Auth::check() 
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

        $user = User::where('id', Auth::user()->id)->first();

        if(!$user->isVendor) {
            $user->isVendor = true;
            $user->update();
        }

        $backgroundImagePath = $this->upload($request->file('backgroundImagePath'), 'stored-shop');

        Shops::create([
            'customerID' => $user->customer->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'addressLine1' => $request->addressLine1,
            'addressLine2' => $request->addressLine2,
            'city' => $request->city,
            'state' => $request->state,
            'postalCode' => $request->postalCode,
            'country' => $request->country,
            'description' => $request->description,
            'backgroundImagePath' => $backgroundImagePath
        ]);

        return redirect()->route('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $shop = new ShopResource(Shops::where('id', $id)->first());

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
            'categoriesWithProducts' => $categoriesWithProducts,
            'hasLogin' => Auth::check() 
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

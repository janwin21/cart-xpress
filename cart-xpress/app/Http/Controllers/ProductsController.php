<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ReviewsResource;
use App\Http\Resources\YourShopsResource;
use App\Models\Categories;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UseUpload;
use App\Models\Reviews;

class ProductsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource with shop id.
     *
     * @return \Illuminate\Http\Response
     */
    public function createWithShopID($shopID) 
    {

        $yourShops = YourShopsResource::collection(
            User::find(Auth::user()->id)->customer->shops);

        return inertia('CartXpressPage/ProductForm', [
            'editable' => false,
            'categories' => Categories::all(),
            'yourShops' => $yourShops,
            'shopID' => $shopID,
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

        $imagePath = $this->upload($request->file('imagePath'), 'stored-product');

        Products::create([
            'shopID' => $request->shopID,
            'categoryID' => Categories::where('name', $request->categoryName)->first()->id,
            'name' => $request->name,
            'size' => $request->size,
            'description' => $request->description,
            'quantityInStock' => $request->quantityInStock,
            'price' => $request->price,
            'discount' => $request->discount,
            'durationOfDeliveryByHour' => $request->durationOfDeliveryByHour,
            //'categoryName' => $request->categoryName,
            'imagePath' => $imagePath 
        ]);

        return redirect()->route('shops.show', $request->shopID);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productQuantity = 0;
        $productOrderedExist = false;

        if(Auth::user()->customer) {

            if(Auth::user()->customer->orders->where('status', 'on-cart')->count()) {

                $existingOrderedProduct = Auth::user()->customer->orders->where('status', 'on-cart')->first()
                    ->orderDetails->where('productID', $id);

                $productOrderedExist = $existingOrderedProduct->count() != 0;

                if($productOrderedExist) {

                    $productQuantity = $existingOrderedProduct->first()->quantityOrdered;

                }

            }

        }

        $tempProduct = Products::where('id', $id)->first();
        $product = new ProductResource($tempProduct);

        return inertia('CartXpressPage/Product', [
            'editable' => $tempProduct->shop->customer->user->id == Auth::user()->id,
            'product' => $product,
            'reviews' => ReviewsResource::collection($product->reviews),
            'productQuantity' => $productQuantity,
            'productOrderedExist' => $productOrderedExist,
            'hasLogin' => Auth::check(),
            'myUser' => Auth::user()
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

        $product = Products::where('id', $id)->first();

        $yourShops = YourShopsResource::collection(
            User::find(Auth::user()->id)->customer->shops);

        return inertia('CartXpressPage/ProductForm', [
            'editable' => true,
            'product' => $product,
            'category' => $product->category,
            'categories' => Categories::all(),
            'yourShops' => $yourShops,
            'shopID' => 0,
            'hasLogin' => Auth::check() 
        ]);

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

        $product = Products::where('id', $id)->first();
        $product->categoryID = Categories::where('name', $request->categoryName)->first()->id;
        $product->name = $request->name;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->quantityInStock = $request->quantityInStock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->durationOfDeliveryByHour = $request->durationOfDeliveryByHour;
        //$product->categoryName = $request->categoryName;
        $product->update();

        return redirect()->route('products.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $product = Products::where('id', $id)->first();
        $product->quantityInStock = 0;
        $product->update();

        return redirect()->route('profile');

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerAddressesResource;
use App\Http\Resources\OnCartShopsResource;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Shops;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('redirect.home');
    }

    public function addToCart(Request $request) 
    {

        $onCartOrder = Orders::where('customerID', Auth::user()->customer->id)
            ->where('status', 'on-cart');

        $orderID = 0;

        // check if customers cart existed
        if($onCartOrder->count() == 0) {

            $onCartOrder = Orders::create([
                'customerID' => Auth::user()->customer->id,
                'comment' => ''
            ]);

            $orderID = $onCartOrder->id;

        } else {

            $orderID = $onCartOrder->first()->id;

        }

        if(!$request->productOrderedExist) {

            OrderDetails::create([
                'orderID' => $orderID,
                'productID' => $request->productID,
                'quantityOrdered' => $request->orderDetailsQuantityOrdered
            ]);

        } else {

            $existingOrderDetails = OrderDetails::where('productID', $request->productID)
                ->where('orderID', $orderID)->first();
            $existingOrderDetails->quantityOrdered = $request->orderDetailsQuantityOrdered;
            $existingOrderDetails->update();

        }

        return redirect()->route('home');

    }

    public function cancel($id) {

        $order = Orders::where('id', $id)->first();
        $order->status = 'cancelled';
        $order->update();

        return redirect()->route('profile');

    }

    public function reOrder($id) {

        $order = Orders::where('id', $id)->first();
        $order->status = 'pending';
        $order->reOrderedDate = new Carbon();
        $order->update();

        return redirect()->route('profile');

    }

    public function showCheckout($id) {

        // display all products on-cart by shops
        $shops = OnCartShopsResource::orderCollection(
            Shops::all()->filter(function($shop) use ($id) {
                return $shop->products->filter(function($product) use ($id) {
                    return $product->orderDetails->where('orderID', $id)->count() > 0;
                })->count() > 0;
            })
        , $id, Auth::user()->isHired);

        return inertia('CartXpressPage/Checkout', [
            'orderID' => $id,
            'shops' => $shops,
            'users' => [],
            'user' => new CustomerAddressesResource(Orders::where('id', $id)->first()->customer->user),
            'hasLogin' => Auth::check(),
            'isHired' => Auth::user()->isHired
        ]);

    }

    public function deliverOrder($id) {

        $order = Orders::where('id', $id)->first();
        $order->status = 'delivered';
        $order->deliveredDate = new Carbon();
        $order->update();

        return redirect()->route('profile');

    }

    public function deleteItem($orderID, $productID) {

        OrderDetails::where('orderID', $orderID)
            ->where('productID', $productID)->first()->delete();

        return redirect()->route('home');

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
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

}

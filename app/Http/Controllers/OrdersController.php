<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Auth;
use App\Models\Orders;

class OrdersController extends Controller
{

	//Admin

	public function viewOrderPage()
	{
		$orders = new Orders;

		$orders = Orders::select('*')
							->join('products','products.prId','orders.prId')
							->join('catagories','products.catId','catagories.catId')
							->join('brands','products.brId','brands.brId')
							->join('users','users.id','orders.cusId')
							->orderBy('orders.ordId', 'desc')
							->get();

		return view('viewOrder' , compact('orders'));
	}

	public function cngOrdSts($ordStatus, $ordId)
	{
		if ($ordStatus == 'Panding') {
			Orders::where('ordId','=',$ordId)->update(['status'=>'Shipping']);
		}
		elseif ($ordStatus == 'Shipping') {
			Orders::where('ordId','=',$ordId)->update(['status'=>'Handed Over']);
		}
		elseif ($ordStatus == 'Handed Over') {
			Orders::where('ordId','=',$ordId)->update(['status'=>'Delete']);
		}
		elseif ($ordStatus == 'Delete') {
			DB::table('orders')->where('ordId', '=', $ordId)->delete();
		}
		
		
		return redirect()->route('viewOrderPage');
	}

	//Admin

	public function order(Request $request)
	{
		$cusId = Auth::user()->id;
		$cusName = Auth::user()->name;
		$method = $request->method;
		$cartContents = Cart::content();

		foreach ($cartContents as $product) {
			$order = new Orders;

			$existOrder = Orders::select('*')
			->where('prId','=',$product->id)
			->where('cusId','=',$cusId)
			->first();

			$orQuantity = $product->qty;

			if ($existOrder) {

				$orQuantity += $existOrder->quantity;
				Orders::where('prId','=',$product->id)->where('cusId','=',$cusId)->update(['quantity'=>$orQuantity]);
				
			}
			else {
				$order->cusId = $cusId;
				$order->cusName = $cusName;
				$order->method = $method;
				$order->prId = $product->id;
				$order->quantity = $orQuantity;

				$order->save();
			}


		}

		Cart::destroy();

		return redirect()->route('orderPage');

	}

	public function orderPage()
	{
		return view('frontend/orderView');
	}

	public function orderDelete($ordId)
	{
		DB::table('orders')->where('ordId', '=', $ordId)->delete();
		
		return redirect()->route('orderPage');
	}
}

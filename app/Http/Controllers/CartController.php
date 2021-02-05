<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
// use App\Models\Cart;
use DB;
use Cart;

class CartController extends Controller
{
    public function cartView()
    {
    	return view('frontend/cartlist');
    }

    public function addtoCart($prId)
    {	
    	$product = DB::table('products')->where('prId', $prId)->first();

    	$data['qty'] = 1;
    	$data['id'] = $prId;
    	$data['name'] = $product->prName;
    	$data['price'] = $product->prPrice;
    	$data['weight'] = $product->prPrice;
    	$data['options']['image'] = $product->prImage;

    	Cart::add($data);

    	return redirect()->route('cartView');
    }

    public function addtoCartQan(Request $request)
    {	

  //   	$cartExist = Cart::select('*')
		// 				->where('prId','=',$request->prId)
		// 				->where('cusId','=',$request->cusId)
		// 				->first();

		// if ($cartExist) {
		// 	return redirect()->route('cartView');
		// }
		// else {
		// 	$cart = new Cart;

		// 	$cart->cusId = $request->cusId;
		// 	$cart->prId = $request->prId;
		// 	if ($request->quantity>0) {
		// 		# code...
		// 		$cart->quantity = $request->quantity;
		// 	}

		// 	$cart->save();

	 //    	return redirect()->route('cartView');
		// }

    	$qty = $request->quantity;
    	$prId = $request->prId;
    	$product = DB::table('products')->where('prId', $prId)->first();

    	$data['qty'] = $qty;
    	$data['id'] = $prId;
    	$data['name'] = $product->prName;
    	$data['price'] = $product->prPrice;
    	$data['weight'] = $product->prPrice;
    	$data['options']['image'] = $product->prImage;

    	Cart::add($data);

    	return redirect()->route('cartView');
    }

    public function upQuantity(Request $request)
    {
    	Cart::update($request->rowId, $request->quantity);
    	return redirect()->route('cartView');

    }
    public function cartDelete($rowId)
    {

    	// Cart::update($rowId, 0); //quantity 0 means no item means delete
    	Cart::remove($rowId);

    	return redirect()->route('cartView');
    }
    
    
}

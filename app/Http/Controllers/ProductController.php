<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use DB;
// use Image;

class ProductController extends Controller
{
    // Dependent Brand selector by ajax
    public function GetBrandAgainstCatagoryEdit($id){
        echo json_encode(DB::table('brands')->where('catId', $id)->get());// Dependent Brand selector by ajax
    }
    // Dependent Brand selector by ajax

	public function addProduct()
	{
		$Catagorys = Catagory::all();
		$Brands = Brand::all();
		return view('addProduct', compact(['Catagorys', 'Brands']));
	}

	public function delproduct($id)
	{
		// $Product = Product::find($id);
		DB::table('products')->where('prId', '=', $id)->delete();
		return redirect()->route('viewProduct');
	}

	public function editproduct($id)
	{
		$product = Product::select('*')
						->where('prId','=',$id)
						->first();

		$Catagorys = Catagory::all();
		$Brands = Brand::all();

		return view('editProduct', compact('product', 'Catagorys', 'Brands'));
	}


    public function viewProduct()
	{
		$products = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->orderBy('products.prId', 'desc')
						->get();

		return view('viewProduct', compact('products'));
	}

	public function viewProDetails($prId)
	{
		$Product = Product::select('*')
					->join('brands', 'brands.brId', 'products.brId')
					->join('catagories', 'catagories.catId', 'products.catId')
					->where('prId','=',$prId)
					->first();

		return view('viewProDetails', compact('Product'));
	}

	

	public function storePro(Request $request)
	{
		$validated = $request->validate([
        	'pName' => 'required|max:30|string',
			'catId' => 'required',
			'brId' => 'required',
			'pInfo' => 'required',
			'pPrice' => 'required',
			'exampleInputFile' => 'required',
    ]);

		$product = new Product;

		$product->prName = $request->pName;
		$product->catId = $request->catId;
		$product->brId = $request->brId;
		$product->prDiscrip = $request->pInfo;
		$product->prPrice = $request->pPrice;

		if ($request->hasfile('exampleInputFile')) {
			$product->prImage = $request->exampleInputFile->store('public/images');
		}

		$product->save();

		return redirect()->route('viewProduct');

	}

	public function storeEditPro(Request $request)
	{
		$validated = $request->validate([
        	'pName' => 'required|max:30|string',
			'catId' => 'required',
			'brId' => 'required',
			'pInfo' => 'required',
			'pPrice' => 'required',
			'exampleInputFile' => 'required',
    ]);
		if ($request->hasfile('exampleInputFile')) {
			$prImage = $request->exampleInputFile->store('public/images');

		Product::where('prId',$request->prId)->update(['prName'=>$request->pName, 'catId'=>$request->catId, 'brId'=>$request->brId, 'prDiscrip'=>$request->pInfo, 'prPrice'=>$request->pPrice, 'prImage'=>$prImage]);
		}
		else{
			Product::where('prId',$request->prId)->update(['prName'=>$request->pName, 'catId'=>$request->catId, 'brId'=>$request->brId, 'prDiscrip'=>$request->pInfo, 'prPrice'=>$request->pPrice]);
		}

		return redirect()->route('viewProduct');

	}




	//frontend

	public function welcomeProduct()
	{
		$sliderP = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->limit(3)
						->inRandomOrder()
						->get();

		$products = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->limit(6)
						->orderBy('prId', 'desc')
						->get();

		$recoProductsDec = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->limit(3)
						->orderBy('prPrice', 'desc')
						->get();

		$recoProductsAsc = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->limit(3)
						->orderBy('prPrice', 'asc')
						->get();

		return view('frontend/welcome', compact('products', 'recoProductsDec', 'recoProductsAsc', 'sliderP'));
	}
	
	public function frontProducts()
	{
		$products = DB::table('products')
					->join('catagories','products.catId','catagories.catId')
					->join('brands','products.brId','brands.brId')
					->paginate(6);

		return view('frontend/products', compact('products'));
	}

	public function frontProductsBySearch(Request $request)
	{
		$products = DB::table('products')
					->join('catagories','products.catId','catagories.catId')
					->join('brands','products.brId','brands.brId')
					->Where('products.prName', 'like', '%' . $request->srcWith . '%')
					->orWhere('products.prDiscrip', 'like', '%' . $request->srcWith . '%')
					->orWhere('brands.brName', 'like', '%' . $request->srcWith . '%')
					->orWhere('catagories.catName', 'like', '%' . $request->srcWith . '%')
					->paginate(6);

		return view('frontend/products', compact('products'));
	}

	

	public function proDetails($id)
	{
		$Product = Product::select('*')
					->join('brands', 'brands.brId', 'products.brId')
					->join('catagories', 'catagories.catId', 'products.catId')
					->where('prId','=',$id)
					->first();

		$recoProductsDec = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->limit(3)
						->orderBy('prPrice', 'desc')
						->get();

		$recoProductsAsc = Product::select('*')
						->join('catagories','products.catId','catagories.catId')
						->join('brands','products.brId','brands.brId')
						->limit(3)
						->orderBy('prPrice', 'asc')
						->get();

		return view('frontend/proDetails', compact('Product', 'recoProductsDec', 'recoProductsAsc'));
	}
	
	public function viewByCatBr($catId, $brId)
	{
		$products = DB::table('products')
					->join('brands', 'brands.brId', 'products.brId')
					->join('catagories', 'catagories.catId', 'products.catId')
					->where('products.catId','=',$catId)
					->where('products.brId','=',$brId)
					->paginate(6);

		return view('frontend/products', compact('products'));
	}

	
	
}

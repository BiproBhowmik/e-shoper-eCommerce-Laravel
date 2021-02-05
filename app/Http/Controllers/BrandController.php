<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DB;

class BrandController extends Controller
{
	public function addBrandAjax(Request $request)
	{
		// Validation
		$validated = $request->validate([
			'catId' => 'required',
			'brName' => 'required|string',
		]);

		$brand = new Brand;

		$brand->catId = $request->catId;
		$brand->brName = $request->brName;

		$brand->save();
		return response()->json($brand);
	}

	public function brDeleteAjax($id){
		
	    DB::table('brands')->where('brId', '=', $id)->delete();
	  
	    return response()->json([
	        'success' => 'Record deleted successfully!'
	    ]);
	}

	public function uppbrAjax(Request $request)
	{

		Brand::where('brId',$request->brEditId)->update(['brName'=>$request->brEditName, 'catId'=>$request->catEditId ]);

		$brand = Brand::select('*')
		->join('catagories','brands.catId','catagories.catId')
		->where('brands.brId','=',$request->brEditId)
		->first();

		return response()->json($brand);
	}

	public function brfindByIdAjax($id){
   
	    $brand = Brand::select('*')
		->where('brands.brId','=',$id)
		->first();

		return response()->json($brand);
		// return response()->json(['data'=>$catagory->catName]);
	}

	public function brfindByCatagoryIdAjax($id){
   
	    $brand = Brand::select('*')
		->where('brands.catId','=',$id)
		->get();

		return response()->json($brand);
		// return response()->json(['data'=>$catagory->catName]);
	}

	

    public function addBrPage()
	{
		return view('addBrand');
	}

	public function delBrand($id)
	{
		// $Brand = Brand::find($id);
		// $Brand->delete();
		DB::table('brands')->where('brId', '=', $id)->delete();
		return redirect()->route('viewBrPage');
	}

	public function editBrand($id)
	{
		// $Brand = Brand::find($id);
		// return view('editBrand')->with('Brand', $Brand);
		$Brandes = Brand::select('*')
						->where('brands.brId','=',$id)
						->join('catagories','brands.catId','catagories.catId')
						->get();

		return view('editBrand', compact('Brandes'));
	}

	public function uppBr(Request $request)
	{	
		Brand::where('brId',$request->brId)->update(['brName'=>$request->brName, 'catId'=>$request->catId]);

		// DB::table('Brandes')
  //           ->where('Brandes.brId', $id)
  //           ->update(['Brandes.catId' => $request->catId] , ['Brandes.brName' => $request->brName]);
		//  $Brand = Brand::select('*')
		//  			->where('Brandes.brId','=',$id)
		//  			->get();

		//  $Brand->catId = $request->catId;
		//  $Brand->brName = $request->brName;

		// $Brand->save();

		return redirect()->route('viewBrPage');
	}

	public function viewBrPage()	//view Brand
	{
		// $Brand = Brand::all();
		// return view('BrandView')->with('Brandes', $Brand);
		$Brandes = Brand::select('*')
						->join('catagories','brands.catId','catagories.catId')
						->orderBy('brId', 'desc')
						->get();

		return view('brandView', compact('Brandes'));
	}	//ok

	public function addBr(Request $request)
    {
    	//Validation
		$validated = $request->validate([
        	'catId' => 'required',
			'brName' => 'required|string',
    	]);

		$Brand = new Brand;

		$Brand->catId = $request->catId;
		$Brand->brName = $request->brName;

		$Brand->save();

		return redirect()->route('viewBrPage');

    }	//ok
}

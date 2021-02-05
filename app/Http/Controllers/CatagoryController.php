<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use DB;

class CatagoryController extends Controller
{
	public function addCatAjax(Request $request)
	{
		// Validation
		$validated = $request->validate([
			'catName' => 'required|string',
		]);

		$catagory = new Catagory;

		$catagory->catName = $request->catName;

		$catagory->save();
		return response()->json($catagory);
	}

	public function catDeleteAjax($id){
   
	    // User::find($id)->delete($id);
	    DB::table('catagories')->where('catId', '=', $id)->delete();
	  
	    return response()->json([
	        'success' => 'Record deleted successfully!'
	    ]);
	}

	public function catfindByIdAjax($id){
   
	    $catagory = Catagory::select('*')
		->where('catagories.catId','=',$id)
		->first();

		return response()->json($catagory);
		// return response()->json(['data'=>$catagory->catName]);
	}


	public function allCatAjax(){
   
	    $catagory = Catagory::select('*')
		->get();

		return response()->json($catagory);
		// return response()->json(['data'=>$catagory->catName]);
	}

	

	public function uppCatAjax(Request $request)
	{

		Catagory::where('catId',$request->catEditId)->update(['catName'=>$request->catEditName]);

		$catagory = Catagory::select('*')
		->where('catagories.catId','=',$request->catEditId)
		->first();

		return response()->json($catagory);
	}

	

	public function addCatPage()
	{
		return view('addCatagory');
	}	//ok

	public function delCatagory($id)
	{
		DB::table('catagories')->where('catId', '=', $id)->delete();
		return redirect()->route('viewCatPage');
	}	//ok

	public function editCatagory($id)
	{
		$Catagorys = Catagory::select('*')
		->where('catagories.catId','=',$id)
		->get();

		return view('editCatagory', compact('Catagorys'));
	}	//ok

	public function uppCat(Request $request)
	{	
		Catagory::where('catId',$request->CatId)->update(['catName'=>$request->catName]);

		return redirect()->route('viewCatPage');
	}

	public function viewCatPage()
	{
		$Catagorys = Catagory::select('*')
						->orderBy('catId', 'desc')
						->get();
		// return view('CatagoryView')->with('Catagorys', $Catagorys);
		return view('CatagoryView', compact('Catagorys'));
	}

	public function addCat(Request $request)
	{
    	//Validation
		$validated = $request->validate([
			'catName' => 'required|string',
		]);

		$catagory = new Catagory;

		$catagory->catName = $request->catName;

		$catagory->save();
		return redirect()->route('viewCatPage');

	}	//ok
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmprList;
use DB;

class CmprListController extends Controller
{
    public function addCmprLst($prId, $cusId)
	{
		$cmprList = new CmprList;

		$cmprList->cusId = $cusId;
		$cmprList->prId = $prId;

		$Product = CmprList::select('*')
						->where('prId','=',$prId)
						->where('cusId','=',$cusId)
						->first();

		if ($Product) {
			return redirect()->route('welcomeProduct');
		}
		else {
			$cmprList->save();
			return view('frontend/cmprlist');
		}
		

	}

	public function removeComp($cmprId)
	{
		$cmprList = new CmprList;

		DB::table('cmpr_lists')->where('cmprId', '=', $cmprId)->delete();
		return redirect()->route('cmprlist');
	}

	public function cmprlist()
	{
		return view('frontend/cmprlist');
	}
}

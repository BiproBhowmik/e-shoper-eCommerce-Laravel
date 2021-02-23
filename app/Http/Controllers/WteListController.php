<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WteList;
use DB;


class WteListController extends Controller
{
	public function addWtLst($cusId, $prId)
	{
		$wteList = new WteList;

		$wteList->cusId = $cusId;
		$wteList->prId = $prId;

		$Product = WteList::select('*')
						->where('prId','=',$prId)
						->where('cusId','=',$cusId)
						->first();

		if ($Product) {
			return redirect()->route('welcomeProduct');
		}
		else {
			$wteList->save();
			return view('frontend/whitelist');
		}
		

		// return redirect()->route('welcomeProduct');
	}

	public function removeWhite($wtId)
	{
		DB::table('wte_lists')->where('wtId', '=', $wtId)->delete();
		return redirect()->route('whitelist');
	}

	public function whitelist()
	{
		

		return view('frontend/whitelist');
	}

	

}

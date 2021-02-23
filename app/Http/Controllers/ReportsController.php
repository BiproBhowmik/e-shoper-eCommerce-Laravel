<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Auth;
use DB;

class ReportsController extends Controller
{
	public function repDeleteAjax($id){
   
	    // User::find($id)->delete($id);
	    DB::table('reports')->where('repId', '=', $id)->delete();
	  
	    return response()->json([
	        'success' => 'Record deleted successfully!'
	    ]);
	}

    public function goToReportPage()
    {
    	return view('frontend/reports');
    }

    public function reportSubmit(Request $request)
    {
    	$validated = $request->validate([
        	'report' => 'required|min:30',
    	]);

    	$report = new Reports;

		$report->cusId = Auth::user()->id;
    	$report->report = $request->report;

    	$report->save();

		return redirect()->route('welcomeProduct');
    }

    public function viewReports()
    {
    	$reports = Reports::select('*')
						->join('users','users.id','reports.cusId')
						->orderBy('reports.repId', 'desc')
						->get();

		return view('viewReports', compact('reports'));
    }

    public function deleteChackedRip(Request $request)
    {
        $ids = $request->ripId;
        Reports::whereIn('repId', $ids)->delete();

        return response()->json(['success'=>"Reports have been deleted!!"]);
    }
    
}

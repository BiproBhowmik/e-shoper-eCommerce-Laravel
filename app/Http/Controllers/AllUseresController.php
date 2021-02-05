<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllUseres;
use DB;

class AllUseresController extends Controller
{
    //Admin

    public function viewUserPrfl($id)
    {
        $user = AllUseres::select('*')
                ->where('users.id','=', $id)
                ->first();

        return view('userProfile', compact('user'));
    }

    //frontend
    public function flogin()
    {
    	return view('frontend/flogin');
    }

	public function checkUser()
    {
    	return view('dashboard');
    }

    public function edituserType($id, $userType)
    {

    	AllUseres::where('id',$id)->update(['userType'=>$userType]);


    	return view('userlist');
    }
}

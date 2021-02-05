<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use DB;
use Auth;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
    	$validated = $request->validate([
        	'prId' => 'required',
			'comment' => 'required',
			'rating' => 'required',
    ]);

		$comment = new Comments;

		$comment->cusId = Auth::user()->id;
		$comment->cusName = Auth::user()->name;
		$comment->prId = $request->prId;
		$comment->comment = $request->comment;
		$comment->prRating = $request->rating;

		$comment->save();

		return redirect()->route('welcomeProduct');
    }
}

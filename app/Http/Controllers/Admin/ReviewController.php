<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function index($id)
    {
        $data = Review::join('users', 'users.id', '=', 'reviews.review_to_user_id')
            ->select('reviews.*', 'users.*', 'reviews.id as review_id')
            ->where('reviews.review_to_user_id', $id)->get();

        return view('admin.review')->with('data', $data);
    }


    public function destroy($id)
    {
        $items = Review::find($id);
        $items->delete();

        Session::flash('success', "Successfully Removed");
        return redirect()->back();
    }
}

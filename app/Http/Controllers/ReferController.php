<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ReferController extends Controller
{
    public function index()
    {
        $user_id = session('user_id');
        $randomKey = 2124;
        $key = base64_encode($randomKey . '-' . $user_id);

        return view('refer-and-earn')->with('refernce_id', $key);
    }
}

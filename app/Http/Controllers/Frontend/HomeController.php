<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fProducts = Product::where(['featured' => 1, 'status' => 1])->get();
        $lProducts = Product::orderBy('created_at', 'desc')->get();
        return view('frontend.home.index', compact('fProducts', 'lProducts'));
    }
}

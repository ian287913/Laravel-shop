<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth('api')->user();


        //User::all()->get();
        //$products = Product::orderBy('created_at', 'DESC')->get();

        $data = [
            'user' => $user
            //'products' => $products,
        ];

        return view('dashboard.index', $data);
    }
}

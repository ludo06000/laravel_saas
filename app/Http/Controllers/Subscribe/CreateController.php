<?php

namespace App\Http\Controllers\Subscribe;

use auth;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $products = Product::all();

        return view('subscribe.create', [
            'intent' => auth()->user()->createSetupIntent(),
            'products' => $products,
        ]);
    }
}

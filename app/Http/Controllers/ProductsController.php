<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $products = $stripe->products->all(['limit' => 3]);
        // dd($products);
        return view('welcome', compact('products'));
    }
}

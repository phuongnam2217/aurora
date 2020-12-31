<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status','1')->orderBy('id','desc')->take(10)->get();
        $bestSeller = Product::where('status','1')->orderBy('sold','desc')->take(10)->get();
        $categories = Category::all();
        return view('customer.index',compact('products','categories','bestSeller'));
    }

    public function detailProduct($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $view = $product->view;
        $view++;
        $product->view = $view;
        $product->save();
        return view('customer.products.detail',compact('categories','product'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $search = $request->search;
        $products = Product::where('name','LIKE',"%$search%")->get();
        if($search == null)
        {
            $products = null;
        }

        return view('customer.products.search',compact('categories','products'));
    }

}

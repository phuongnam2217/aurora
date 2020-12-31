<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ArosesController extends Controller
{
    public  function index($name)
    {
        $categories = Category::all();
        $value = 3;
        $category = Category::where('name',$name)->first();
        $products = Product::where('category_id',$category->id)
            ->where('status',1)
            ->paginate($value);
        $sorts = "default";
        $orders = "default";
        return view('customer.categories.necklaces',compact('categories','name','products','sorts','orders','value'));
    }
    public function sort($name,$sort,$order,$value)
    {
        $categories = Category::all();
        if($sort == "default" && $order == "default"){
            $category = Category::where('name',$name)->first();
            $products = Product::where('category_id','=',$category->id)
                ->where('status',1)
                ->paginate($value);
            $sorts = $sort;
            $orders = $order;
            return view('customer.categories.necklaces',compact('categories','name','products','sorts','orders','value'));
        }
        $category = Category::where('name',$name)->first();
        $products = Product::where('category_id','=',$category->id)
            ->where('status',1)
            ->orderBy($sort,$order)
            ->paginate($value);
        $sorts = $sort;
        $orders = $order;
        return view('customer.categories.necklaces',compact('categories','name','products','sorts','orders','value'));
    }
}

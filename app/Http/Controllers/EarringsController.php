<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EarringsController extends Controller
{
    public function index(){
        $products = Product::where('category_id','=',2)->where('status',1)->paginate(3);
        $sorts = "default";
        $orders = "default";
        $value = 3;
        return view('customer.categories.earrings',compact('products','sorts','orders','value'));
    }
    public function sortPagination($sort,$order,$value)
    {
        if($sort == "default" && $order == "default"){
            $products = Product::where('category_id','=',3)->where('status',1)->paginate($value);
            $sorts = $sort;
            $orders = $order;
            return view('customer.categories.earrings',compact('products','sorts','orders','value'));
        }
        $products = Product::where('category_id','=',3)->where('status',1)
            ->orderBy($sort,$order)
            ->paginate($value);
        $sorts = $sort;
        $orders = $order;
        return view('customer.categories.earrings',compact('products','sorts','orders','value'));
    }
}

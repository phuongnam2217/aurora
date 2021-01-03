<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index()
    {
        $start = new Carbon('first day of last month');
        $end = new Carbon('last day of last month');
        $startDay = new Carbon('last day');
        $endDay = new Carbon('first day');
        $orderOfDay = Order::whereBetween('created_at',[$startDay,$endDay])->get();
        $orderOfMonth = Order::whereBetween('created_at',[$start,$end])->get();
        $products = Product::where('stock',">",0)->get();
        $productsOver = Product::where('stock',"=",0)->get();
        $customers = Customer::all();
        $customersOfDay = Customer::whereBetween('created_at',[$startDay,$endDay])->get();
        return view('admin.dashboard',compact('orderOfDay','orderOfMonth','products','productsOver','customers','customersOfDay'));
    }
}

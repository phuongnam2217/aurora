<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class DashBoardController extends Controller
{
    public function index()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
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

    public function info()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('admin.account.info',compact('user'));
    }
    public function update(InfoRequest $request,$id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('success',"Update Infomation Successfully");
    }
    public function avatar()
    {
        return view('admin.account.avatar');
    }
    public function changeAvatar(Request $request)
    {
        $request->validate([
            'image'=>'image'
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $filename = Storage::disk('s3')->put('avatars', $request->image, 'public');
        $user->image = $filename;
        $user->save();
        return back()->with('success','Change Avatar Successfully');
    }
    public function password()
    {
        return view('admin.account.password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password'         => 'required|min:6',
        'password_confirm' => 'required|same:password' 
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Change Password Successfully');
    }
}

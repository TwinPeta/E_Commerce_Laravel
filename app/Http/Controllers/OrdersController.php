<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        return view('checkout.review_order',compact('shipping_address','cart_datas','total_price'));
    }
    public function order(Request $request){
        $input_data=$request->all();
        $payment_method=$input_data['payment_method'];
        Orders_model::create($input_data);
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        
        $user_order=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.cod',compact('user_order'));
    }
    public function paypal(Request $request){
        $who_buying=Orders_model::where('users_id',Auth::id())->first();
        return view('payment.paypal',compact('who_buying'));
    }
    public function order_list()
    {
        $menu_active=5;
        $order=Orders_model::all();
        return view('backEnd.orders.index',compact('menu_active','order'));
    }

    public function orderTrack(){
        return view('frontEnd.order-track');
    }
    public function productTrackOrder(Request $request){
        // return $request->all();
        $order=Orders_model::where('users_id',auth()->user()->id)->where('id',$request->order_number)->first();
        if($order){
            if($order->order_status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('cod');

            }
            elseif($order->order_status=="about"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('cod');
    
            }
            elseif($order->order_status=="success"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('cod');
    
            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('cod');
    
            }
        }
        else{
            request()->session()->flash('error','Invalid order numer please try again');
            return redirect()->route('order.track');
        }
    }


}

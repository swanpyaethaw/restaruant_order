<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        $dishes = Dish::orderBy('id','desc')->get();

        $tables = Table::all();
        $orders = Order::where('status',4)->get();
        $status = array_flip(config('res.order_status'));
        return view('order_form',compact('dishes','tables','orders','status'));
    }

    public function search(Request $request){
        $search = $request->search;
        $dishes = Dish::where('name','LIKE','%'.$search.'%')->get();

        $tables = Table::all();
        $orders = Order::where('status',4)->get();
        $status = array_flip(config('res.order_status'));
        return view('order_form',compact('dishes','tables','orders','status'));
    }

    public function submit(Request $request){
        $orders = array_filter($request->except('_token','table'));
        $orderId = rand(10000,99999);
        foreach($orders as $key=>$value){
            if($value>1){
                for($i=0;$i<$value;$i++){
                    $this->save($orderId,$key,$request);
                }
            }elseif($value <= 0){
                //
            }else{
                $this->save($orderId,$key,$request);
            }

        }
        return redirect('/')->with('message','Order Submitted');
    }

    public function save($orderId,$key,$request){
        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $key;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');
        $order->save();
    }



    public function serve(Order $order){
        $order->status = 5;
        $order->save();
        return redirect('/')->with('message','Order Served');
    }
}

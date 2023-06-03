<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderlist(){

       // $data = Order::all();

    //    ＄users = DB::table('Order')
    //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //         ->select('users.*', 'contacts.phone', 'orders.price')
    //         ->get();


    // $data = Order::join('posts', 'Customer.id', '=', 'posts.user_id')
    // ->get(['Customer.*', 'posts.descrption']);


    $data = DB::table('orders')
            ->join('customers', 'orders.id', '=', 'customers.id')
            ->select('orders.*', 'customers.phone_number', 'customers.town')
            ->get();

        //    dd($data);
        return view('Order.orderList',['order' => $data]);
    }

    public function orderlistBY($id){

        $data = Order::where('id',$id)->get();

        return view('Order.orderList',['order' => $data]);
    }

    public function create(){

        $data = Customer::all();
            $Product =  Product::all();
        return view('Order.create_order',['customer' => $data],['product' => $Product])->with('title', 'Add Order');
    }

    public function store(Request $request){

        $validated = $request->validate([
            "name" =>'required',
            "order" =>  'required',
            "amount" => 'required',
            "payment" => 'required',
            "deliver_charge" => "",
            "note" => "",
        ]);

        Order::create($validated);
        return  back()->with('message', 'Order was Successfully Add!');
    }

    public function getPrice(Request $request)
    {
        $data['states'] = Product::where("name",$request->product_name)
                    ->get(["selling_price","id"]);
        return response()->json($data);
    }

}

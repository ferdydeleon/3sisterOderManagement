<?php

namespace App\Http\Controllers;

use App\Models\orderlist as ModelsOrderlist;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderlist(){

        $data = ModelsOrderlist::all();

        return view('Order.orderList',['order' => $data]);
    }

    public function orderlistBY($id){

        $data = ModelsOrderlist::where('id',$id)->get();

        return view('Order.orderList',['order' => $data]);
    }
}

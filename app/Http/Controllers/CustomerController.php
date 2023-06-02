<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function addCustomersForm(Request $request){
        return view('customers.form');
    }


    public function addOrderForm(Request $request){
        return view('customers.create_order');
    }


}

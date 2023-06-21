<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function view()
    {
        $data = DB::table('orders')
        ->leftJoin('products', 'orders.product', '=', 'products.id')
        ->select(DB::raw("SUM(orders.quantity) AS total_qty "),DB::raw("SUM(orders.total) AS total_selling"), DB::raw("SUM(orders.quantity) * products.original_price AS total_original"),  'orders.product','products.name')
        ->orderBy(DB::raw("SUM(orders.quantity)"), 'desc')
        ->groupBy('orders.product')
        ->get();

        $data1 = DB::table('products')
        ->leftJoin('orders', 'products.id', '=', 'orders.product')
        ->select(DB::raw('DATE_FORMAT(orders.created_at,"%M") as month'),DB::raw("SUM(orders.total) AS total_selling"), DB::raw("SUM(orders.quantity * products.original_price) AS total_original"))
        ->orderBy( DB::raw('MONTH(orders.created_at)'))
        ->groupBy( DB::raw('MONTH(orders.created_at)'))
        ->get();

        $data2 = DB::table('orders')
        ->leftJoin('customer_orders', 'orders.refno', '=', 'customer_orders.refno')
        ->join('customers', 'customer_orders.customer_name', '=', 'customers.id')
        ->select(DB::raw("SUM(orders.quantity) AS total_qty "),'customers.name as name')
        ->orderBy(DB::raw("SUM(orders.quantity)"), 'desc')
        ->groupBy('customer_orders.customer_name')
        ->limit(8)
        ->get();




        return view('dashboard.index',['top' => $data ,'income' => $data1, 'topCustomer' => $data2])->with('title', 'Dashboard');
    }

}

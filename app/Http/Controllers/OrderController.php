<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Customer_order;
use App\Models\Product;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function orderlist(Request $request)
    {


        if ($request->isMethod('GET')) {
            $data = DB::table('customer_orders as t1')
                ->rightJoin('orders as t2', 't2.refno', '=', 't1.refno')
                ->join('customers as t3', 't3.id', '=', 't1.customer_name')
                ->select(DB::raw("SUM(t2.total) as grand_total"), 't1.refno', 't3.name', 't3.phone_number', 't1.total_payment', 't1.mode_of_payment', 't1.payment_status', 't1.note', 't1.created_at')
                ->orderBy('t2.created_at', 'desc')
                ->groupBy('t2.refno')
                ->paginate(5);
            // ->get();
            return view('Order.orderList', ['order' => $data])->with('title', 'Order List');
        }
        if ($request->isMethod('POST')) {
            $data = DB::table('customer_orders')
                ->rightJoin('orders as t2', 't2.refno', '=', 't1.refno')
                ->join('customers as t3', 't3.id', '=', 't1.customer_name')
                ->select(DB::raw("SUM(t2.total) as grand_total"), 't1.refno', 't3.name', 't3.phone_number', 't1.total_payment', 't1.mode_of_payment', 't1.payment_status', 't1.note', 't1.created_at')
                ->orderBy('t2.created_at', 'desc')
                ->whereBetween('t2.created_at', [$request['start'], $request['end']])
                ->groupBy('t2.refno')
                ->paginate(5);

            return view('Order.orderList', ['order' => $data])->with('title', 'Order List');
        }
    }

    public function orderlistBY($id)
    {

        $data = Order::where('id', $id)->get();

        return view('Order.orderList', ['order' => $data]);
    }

    public function create()
    {

        $data = Customer::all();
        $Product =  Product::all();
        return view('Order.create_order', ['customer' => $data], ['product' => $Product])->with('title', 'Add Order');
    }

    public function store(Request $request)
    {
        $uniqid = Str::random(4);
        $nameCustomer =  $request->input('customer_name');
        $mode_of_payment =  $request->input('mode_of_payment');
        $charge =  $request->input('charge');
        $note =  $request->input('note');

        $productname = $request->product;
        $quantity = $request->quantity;
        $price = $request->price;
        $total = $request->total;
        $productname = $request->product;
        $quantity = $request->quantity;
        $price = $request->price;
        $total = $request->total;

        foreach ($request->product as $index => $unit) {
            $validated = [
                "refno" =>  $uniqid,
                "product" => $productname[$index],
                "quantity" =>  $quantity[$index],
                "price" =>  $price[$index],
                "total" =>  $total[$index],
            ];

            Product::where('id', $productname[$index])->decrement('quantity', $quantity[$index]);

            Order::create($validated);
        }

        // $info =   $request->validate([
        //     "refno" =>  $uniqid,
        //     "customer_name" => 'required',
        //     "total_payment" =>  '',
        //     "charge" => 'required',
        //     "mode_of_payment" => 'required',
        //     "payment_status" => '',
        //     "note" => "",
        // ]);


        $info = [
            "refno" =>  $uniqid,
            "customer_name" =>  $nameCustomer,
            "total_payment" =>  '',
            "charge" => $charge == null ? 0: $charge,
            "mode_of_payment" => $mode_of_payment,
            "payment_status" => '',
            "note" =>  $note,
        ];

        Customer_order::create($info);

        return  back()->with('message', 'Order was Successfully Add!');
        // $request->validate([
        //     "refno" =>  $uniqid,
        //     "customer_name" => 'required',
        //     "total_payment" =>  '',
        //     "charge" => 'required',
        //     "mode_of_payment" => 'required',
        //     "payment_status" => '',
        //     "note" => "",
        // ]);

    }
    public function getPrice(Request $request)
    {
        $data['states'] = Product::where("id", $request->product_name)
            ->get(["selling_price", "quantity", "id"]);
        return response()->json($data);
    }

    public function searchByDate(Request $request)
    {
        // dd($request);
        $data = DB::table('orders')
            ->leftJoin('customers', 'orders.name', '=', 'customers.name')
            ->join('towns', 'towns.id', '=', 'customers.town')
            ->join('barangays', 'barangays.id', '=', 'customers.barangay')
            ->select('orders.*', 'customers.phone_number', 'towns.town AS town', 'barangays.barangay AS barangay', 'customers.street')
            ->orderBy('orders.created_at', 'desc')
            ->whereBetween('orders.created_at', [$request['start'], $request['end']])
            ->groupBy('orders.id')
            ->paginate(5);
        return view('Order.orderList', ['order' => $data])->with('title', 'Order List');

        // return back()->withInput($request->only('name'),['order' => $data]);
    }

    public function NewForm()
    {

        $data = Customer::all();
        $Product =  Product::all();
        return view('Order.addform', ['customer' => $data], ['product' => $Product])->with('title', 'Order Form');
    }


    public function viewOrder($refno)
    {
        $data = DB::table('orders')
            ->leftJoin('products', 'orders.product', '=', 'products.id')
            ->select('*', 'orders.quantity as qty')
            ->orderBy('orders.created_at', 'desc')
            ->where('orders.refno', [$refno])
            ->paginate(10);

        $grandtotal = DB::table('orders')
            ->select(DB::raw("SUM(total) as grand_total"))
            ->groupBy('refno')
            ->where('refno', [$refno])
            ->get();


        // dd( $grandtotal);

        return view('Order.view_order', ['orders' => $data, 'grandTotal' => $grandtotal])->with('title', 'View Order');
    }
}
        // $data = array("order" => DB::table('orders')
        // ->leftJoin('customers', 'orders.name', '=', 'customers.name')
        // ->select('orders.*', 'customers.*')
        // ->orderBy('orders.created_at', 'desc')
        // ->groupBy('orders.id')
        // ->paginate(10));
        // return view('Order.orderList',  $data)->with('title', 'Order List');

        // $data =   DB::table('customers')
        // ->leftjoin('orders', 'customers.id', '=', 'orders.id')
        // ->orderBy('orders.created_at', 'desc')
        // ->groupBy('orders.id')
        // ->select('orders.*','customers.*')

        // ->paginate(15);
        // return view('Order.orderList', ['order' => $data])->with('title', 'Order List');

        // $data = Order::select('*')
        // ->join("customers", "customers.id", "=", "orders.id")
        // ->groupBy('customers.name')
        // ->get();

        // $data = Order::select('order.*', DB::raw('count(id) as connections'))
        //     ->leftJoin('customers', 'customers.id', '=', 'order.id')
        //     ->groupBy('order.id')
        //     ->get();


        // $data = DB::table('orders')
        //         ->join('customers', 'orders.name', '=', 'customers.name')
        //         ->select('orders.*', 'customers.phone_number', 'customers.town','customers.barangay','customers.street')
        //         ->get();

                // $data = Order::all();

        //    ＄users = DB::table('Order')
        //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //         ->select('users.*', 'contacts.phone', 'orders.price')
        //         ->get();

        // $data = Order::join('posts', 'Customer.id', '=', 'posts.user_id')
        // ->get(['Customer.*', 'posts.descrption']);

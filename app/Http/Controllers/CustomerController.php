<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customers.create')->with('title', 'Add Customer');
    }

    public function list()
    {
        // $data = Customer::all();
        $data = array("customer" => DB::table('customers')->orderBy('created_at', 'desc')->paginate(5));
        return view('customers.list',  $data)->with('title', 'Customer List');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "phone_number" =>  'required|min:11',
            "town" => ['required', 'min:4'],
            "barangay" => ['required', 'min:4'],
            "street" => ['required', 'min:4'],
        ]);

        Customer::create($validated);
        return redirect('customer/create')->with('message', 'New Customer was added successfully!');
    }


    public function show($id)
    {

        // $data = Customer::where('id',$id)->get();
        $data = Customer::findOrFail($id);
        return view('customers.edit', ['customer' => $data])->with('title', 'Update Customer na');
    }

    public function update(Request $request, Customer $customer, $id)
    {

        $validated = $request->validate([
            "name" => 'required',
            "phone_number" =>  'required|min:11',
            "town" => 'required',
            "barangay" => 'required',
            "street" => 'required',
        ]);

        Customer::where('id', $id)->update($validated);
        // $customer->update($validated);
        return back()->with('message', 'Data Was Successfully Updated');
        //  return "hellow";
    }

    public function delete($id)
    {
        //dd($customer);
        // $customer->delete();
        Customer::where('id', $id)->delete();
        return  back()->with('message', 'Data was Successfully Deleted!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\Town;

class CustomerController extends Controller
{
    public function create()
    {
        $town =  Town::all();

        return view('customers.create', ['town' => $town])->with('title', 'Add Customer');
    }

    public function list(Request $request)
    {
        // $data = Customer::all();
        if ($request->isMethod('GET')) {
            $data = DB::table('customers')
            ->join('towns', 'towns.id', '=', 'customers.town')
            ->join('barangays', 'barangays.id', '=', 'customers.barangay')
            ->select('customers.*', 'towns.town AS city', 'barangays.barangay AS state')
            //->orderBy('customers.created_at', 'desc')
            ->paginate(5);
            return view('customers.list', ['customer' => $data])->with('title', 'Customer List');
        // $data = array("customer" => DB::table('customers')->orderBy('created_at', 'desc')->paginate(5));
        // return view('customers.list',  $data)->with('title', 'Customer List');
        }

        if ($request->isMethod('POST')) {
            $data = DB::table('customers')
            ->join('towns', 'towns.id', '=', 'customers.town')
            ->join('barangays', 'barangays.id', '=', 'customers.barangay')
            ->select('customers.*', 'towns.town AS city', 'barangays.barangay AS state')
            ->where('customers.name','LIKE', '%'.$request['name'].'%')
            ->paginate(5);
            return view('customers.list', ['customer' => $data])->with('title', 'Customer List');
        }

    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "phone_number" =>  'required|min:11',
            "town" => ['required'],
            "barangay" => ['required'],
            "street" => ['required', 'min:4'],
        ]);

        Customer::create($validated);
        return redirect('customer/create')->with('message', 'New Customer was added successfully!');
    }

    public function show($id)
    {
        // $data = Customer::where('id',$id)->get();
        $data = Customer::findOrFail($id);
        return view('customers.edit', ['customer' => $data])->with('title', 'Update Customer');
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


    public function getBarangay(Request $request)
    {

        $data['states'] = Barangay::where("townID", $request->town_id)
            ->get(["barangay", "id"]);
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function list()
    {
        // $data = Customer::all();
        $data = array("product" => DB::table('products')->orderBy('created_at', 'desc')->paginate(5));
        return view('product.list',  $data)->with('title', 'Product List');
    }

    public function create()
    {
        return view('product.create')->with('title', 'Add Product');
    }

    public function store(Request $request)
    {
        //  dd($request);
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "quantity" =>  'required',
            "original_price" => 'required',
            "selling_price" => 'required',
        ]);


        Product::create($validated);
        return redirect('/product/create')->with('message', 'New Product was added successfully!');
    }

    public function show($id)
    {

        $data = Product::findOrFail($id);
        return view('product.edit', ['items' => $data])->with('title', 'Update Product');
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            "name" => 'required',
            "quantity" => 'required',
            "original_price" => 'required',
            "selling_price" => 'required',
        ]);

        Product::where('id', $id)->update($validated);

        return back()->with('message', 'Data Was Successfully Updated');
        //  return "hellow";
    }

    public function delete($id)
    {

        Product::where('id', $id)->delete();
        return  back()->with('message', 'Data was Successfully Deleted!');
    }




}

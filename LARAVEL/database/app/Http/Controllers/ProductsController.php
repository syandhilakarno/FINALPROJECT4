<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        // Fetch all products from the database
        $products = \App\Models\Product::all();

        // Return the view with the products data
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>'required|min:3',
            'brand'=> 'required',
            'category'=> 'required',
            'price'=> 'required',
            'image_url'=> 'required',
            'description'=> 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->messages())->setStatusCode(422);
        }
        $payload = $validator->validated();
        product::create([
            'name' => $payload['name'],
            'brand'=> $payload['brand'],
            'category'=> $payload['category'],
            'price'=> $payload['price'],
            'image_url'=> $payload['image_url'],
            'description'=> $payload['description']
        ]);
        return response()->json([
            'msg'=>'data berhasil disimpan'
        ],201);
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' =>'required|min:3',
            'brand'=> 'required',
            'category'=> 'required',
            'price'=> 'required',
            'image_url'=> 'required',
            'description'=> 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID
        $product = \App\Models\Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect back to the products index with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
        
    }
}

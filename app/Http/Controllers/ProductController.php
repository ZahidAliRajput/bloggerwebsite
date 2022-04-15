<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        
        return view('admin.products.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($validator->fails()){
            return back()->with('message', $validator->errors()->first());
        }
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/category', $filename);
            $product_image = $filename;
        }

        $product = new Product();

         $product->category_id = $request->category_id;
         $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $product_image;
        $productstore = $product->save();
        if($productstore){
            return redirect()->route('products')->with("message","Product is added Successfully");
        }else{
            return redirect()->route('products')->with("message","Product is not added.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('category')->find($id);
        // dd($product);
        $categories = Category::all();
        return view('admin.products.update', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if($validator->fails()){
            return back()->with('message', $validator->errors()->first());
        }
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('uploads/category', $filename);
            $product_image = $filename;
        }
        else{
            $product = Product::find($request->id);
            $product->category_id = $request->category_id;
            $product->name = $request->name;
           $product->price = $request->price;
           $product->description = $request->description;
           $productstore = $product->update();
           if($productstore){
               return redirect()->route('products')->with("message","Product is updated Successfully");
           }else{
               return redirect()->route('products')->with("message","Product is not updated.");
           }
        }

        // $product = new Product();
        $product = Product::find($request->id);
         $product->category_id = $request->category_id;
         $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $product_image;
        $productstore = $product->update();
        if($productstore){
            return redirect()->route('products')->with("message","Product is updated Successfully");
        }else{
            return redirect()->route('products')->with("message","Product is not updated.");
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product);
        $product->delete();
        return redirect()->route('products')->with('message', "Product is deleted");
    }
}

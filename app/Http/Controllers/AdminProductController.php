<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\category;
use App\Models\product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::get();

        return view('admin.controller.add_product' , [ 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $image_name = "product".$request->name.$ext;

        $image->move(public_path('images/product') , $image_name);


        product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'old-price'=> $request->price,
            'new-price' => ($request->price - $request->price * $request->discount),
            'image' => $image_name,
            'discription' => $request->discription,
            'discount' => $request->discount,
            'avaliable' => $request->avaliable,
            'Isdiscount' => ($request->discount != 0),
        ]);
        return redirect(RouteServiceProvider::Admin)->with('success' , 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\category;
use App\Models\product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'OldPrice'=> $request->price,
            'NewPrice' => ($request->price - $request->price * $request->discount/100),
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
        $product = product::find($id);
        $categories = category::get();

        return view('admin.product.edit',['product' => $product , 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $product = product::find($id);



        $request->validate([
            'name' =>['required',
                    Rule::unique('products','name')->ignore($id)],
            'price' => ['required' , 'numeric','decimal:0,2'],
            'discription' => ['required'],
            'discount' =>['required','numeric','between:0,100'],
            'avaliable' =>['required','numeric','min:1'],
            'category' =>['required'],
        ]);
        $image_name = $product->image;
        if($request->files->has('image')){
            $request->validate([
                'image' => 'required|image',
            ]);
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $image_name = "product".$request->name.$ext;
            $img->move(public_path('images/product'),$image_name);
        }

        $product->name = $request->name;
        $product->discription = $request->discription;
        $product->discount = $request->discount;
        $product->image = $image_name;
        $product->avaliable = $request->avaliable;
        $product->OldPrice = $request->price;
        $product->NewPrice = $request->price - ($request->price * $request->discount / 100);
        $product->category_id = $request->category;
        $product->Isdiscount = ($request->discount != 0);

        $product->save();

        return redirect(RouteServiceProvider::Admin)->with('success' , 'Product Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $product = product::find($id)->delete();
         return redirect(RouteServiceProvider::Admin)->with('success' , 'Product Deleted Successfully!');
    }
}

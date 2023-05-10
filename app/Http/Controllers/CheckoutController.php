<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Models\checkout;
use App\Models\order;
use App\Models\product;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->session()->has('cart')){

            $products = $request->session()->get('cart');
            return view('home.checkout' , ['products' => $products]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BillingRequest $request)
    {
        // check all product are avaliable

        $productsInCart = session('cart')->items;

        foreach($productsInCart as $item){
            if( $item['qty'] > $item['item']->avaliable ){
                return redirect()->back()->with('Not Avaliabe'
                                                , 'There is only '. $item['item']->avaliable . ' left for' . $item['item']->name);
            }
        }

        // update avaliable products in database

        foreach($productsInCart as $item){
            $product = product::find($item['item']->id);
            $product->avaliable = $product->avaliable - $item['qty'];
            $product->save();

        }
        // insert request in checkouts table
        $checkout = checkout::create([
            'name'=> $request->fname . $request->lname,
            'company_name' => ($request->has('company_name') ? $request->company_name : null),
            'main_address'=> $request->main_address,
            'more_address' => ($request->has('more_address') ? $request->more_address : null),
            'city'=> $request->city,
            'state'=> $request->state,
            'postcode'=> $request->postcode,
            'email'=> $request->email,
            'phone' => $request->phone,
            'totalPrice'=> session('cart')->totalPrice,

        ]);
        // insert all products in orders table
        foreach($productsInCart as $item){

            order::create([
                'checkout_id' => $checkout->id,
                'product_name' => $item['item']->name,
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        // clear the cart
        session()->forget('cart');

        //return home
        return redirect(RouteServiceProvider::HOME)->with('order successed' , 'Your ordered has been shipped successfully!');
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

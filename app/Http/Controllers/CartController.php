<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\product;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CartController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
    public function add(Request $request , $id , $count){
        $product = product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null ;


        $productsInCart = 0 ;

        if($oldCart && array_key_exists($id , $oldCart->items)){
            $productsInCart = $oldCart->items[$id]['qty'];
        }

        if($product->avaliable < $productsInCart + 1){
            return redirect()->back()->with('fail' , 'You have requested '. $product->name .' more than avaliable ' . $product->avaliable);

        }

        $Cart = new cart($oldCart);
        $Cart->addToCart($product , $count);

        $request->session()->put('cart' , $Cart);


        return redirect(RouteServiceProvider::HOME)->with('success' , 'Product Added');
    }
    public function addMany(Request $request , $id){
        $product = product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null ;

        $request->validate([
            'count' => ['required','numeric','min:1'],
        ]);

        $productsInCart = 0 ;

        if($oldCart && array_key_exists($id , $oldCart->items)){
            $productsInCart = $oldCart->items[$id]['qty'];
        }

        if($product->avaliable < $productsInCart + $request->count){
            return redirect()->back()->with('fail' , 'You have requested more than avaliable ' . $product->avaliable);
        }
        $Cart = new cart($oldCart);
        $Cart->addToCart($product , $request->count);

        $request->session()->put('cart' , $Cart);


        return redirect(RouteServiceProvider::HOME)->with('success' , 'Product Added');
    }
    public function delete(Request $request , $id)
    {
        $oldCart = $request->session()->get('cart');

        $cart = new cart($oldCart);
        $cart->remove($id);
        if($cart->totalPrice)
            $request->session()->put('cart' , $cart);
        else
            $request->session()->forget('cart');
        return redirect(RouteServiceProvider::HOME);
    }
}

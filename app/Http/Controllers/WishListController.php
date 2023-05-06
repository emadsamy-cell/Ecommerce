<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::check()){
            $wishlist = Auth::user()->wishlists;
            return view('home.wishlist' , ['wishlist' => $wishlist]);
        }
        else{
            return redirect(route('login'));
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
    public function store(Request $request)
    {
        if(Auth::check()){
            $id = key($request->query());

            $check = wishlist::where('user_id' , Auth::user()->id)->where('product_id',$id)->get();


            if(count($check) == 0){
                wishlist::create([
                    'product_id' => $id,
                    'user_id' => Auth::user()->id,
                ]);
            }

            $wishlist = Auth::user()->wishlists;

            return view('home.wishlist' , ['wishlist' => $wishlist]);
        }
        else{
            return redirect(route('login'));
        }
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
        wishlist::find($id)->delete();
        return redirect()->back();
    }
}

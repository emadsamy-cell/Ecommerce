<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminUserController extends Controller
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
    public function create(): View
    {
        return view('admin.controller.add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => 1,
        ]);
     //   event(new Registered($user));




        return redirect(RouteServiceProvider::Admin)->with('success' , 'New User Successfully Added!');
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
        $user = User::find($id)->first();

        return view('admin.user.edit' , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'password' =>['required','confirmed'],
            'name'=>['required','string'],
            'email' =>['required' , Rule::unique('Users', 'email')->ignore($id)],
        ]);

        $user = User::find($id)->first();

        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        $user->save();

        return redirect(RouteServiceProvider::Admin)->with('success' , 'User Updated Successfullty!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
         return redirect(RouteServiceProvider::Admin)->with('success' , 'User Deleted Successfully!');
    }
}

@extends('layouts.master')

@section('title' , 'Register')
@section('content')
<div class="page-section mb-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                    <!-- Name -->
                        <div class="row ">
                            <div class="col-md-12 col-12 mb-20">
                                <label>Full Name</label>
                                <x-text-input id="name" class="mb-0" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                    <!-- Email Address -->
                            <div class="col-md-12 mb-20">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="mb-0" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                    <!-- Password -->
                            <div class="col-md-6 mb-20">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="mb-0"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                    <!-- Confirm Password -->
                            <div class="col-md-6 mb-20">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="mb-0"
                                                type="password"
                                                name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="col-12">
                                <button class="register-button mt-0">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


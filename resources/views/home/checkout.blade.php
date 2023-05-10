@extends('layouts.master')

@section('title' , 'Checkout')

@section('content')
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <!--Accordion Start-->
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="login-form">
                                        <h4 class="login-title">Login</h4>
                                        <div class="row">
                                            <div class="col-md-12 col-12 mb-20">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class="mb-0" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                    <!-- Password -->
                                            <div class="col-12 mb-20">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class="mb-0"
                                                                type="password"
                                                                name="password"
                                                                required autocomplete="current-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                    <!-- Remember Me -->
                                            <div class="col-md-8">
                                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                    <input type="checkbox" id="remember_me">
                                                    <label for="remember_me">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif
                                            </div>

                                            <div class="col-md-12">
                                                <button class="register-button mt-0">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Accordion End-->
                        <!--Accordion Start-->
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!--Accordion End-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12">
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="nice-select wide" name = "country">
                                        <option data-display="Bangladesh">Bangladesh</option>
                                        <option value="uk">London</option>
                                        <option value="rou">Romania</option>
                                        <option value="fr">French</option>
                                        <option value="de">Germany</option>
                                        <option value="aus">Australia</option>
                                        </select>
                                        @if ($errors->has('country'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('country') }} </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="fname">
                                        @if ($errors->has('fname'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('fname') }} </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="lname">
                                        @if ($errors->has('lname'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('lname') }} </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" type="text" name="company_name">
                                    </div>
                                    @if ($errors->has('company_name'))

                                        <span class="list-group-item list-group-item-danger"> {{ $errors->first('company_name') }} </span>

                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" name="main_address">
                                    </div>
                                    @if ($errors->has('main_address'))

                                        <span class="list-group-item list-group-item-danger"> {{ $errors->first('main_address') }} </span>

                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="more_address">
                                    </div>
                                    @if ($errors->has('more_address'))

                                        <span class="list-group-item list-group-item-danger"> {{ $errors->first('more_address') }} </span>

                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="city">
                                    </div>
                                    @if ($errors->has('city'))

                                        <span class="list-group-item list-group-item-danger"> {{ $errors->first('city') }} </span>

                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="state">
                                        @if ($errors->has('state'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('state') }} </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="postcode">
                                        @if ($errors->has('postcode'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('postcode') }} </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email" name="email">
                                        @if ($errors->has('email'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('email') }} </span>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone  <span class="required">*</span></label>
                                        <input type="text" name="phone">
                                        @if ($errors->has('phone'))

                                            <span class="list-group-item list-group-item-danger"> {{ $errors->first('phone') }} </span>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                @if (Session::has('Not Avaliabe'))

                                        <span class="list-group-item list-group-item-danger"> {{ Session::get('Not Avaliabe') }} </span>

                                @endif
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products->items as $product)
                                            <tr class="cart_item">
                                                <td class="cart-product-name">{{ $product['item']->name }}<strong class="product-quantity"> × {{ $product['qty'] }}</strong></td>
                                                <td class="cart-product-total"><span class="amount">${{ $product['price'] * $product['qty'] }}</span></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">${{ $products->totalPrice }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">${{ $products->totalPrice }}</span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                        <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Direct Bank Transfer.
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            Cheque Payment
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                    <h5 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            PayPal
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input value="Place order" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

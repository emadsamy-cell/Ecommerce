@extends('layouts.master')

@section('title' , 'Shoping Cart')


@section('content')



<div class="Shopping-cart-area pt-60 pb-60">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cart.update' , 1) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="table-content table-responsive">
                            @if (\Session::has('updated'))

                                <span class = "list-group-item list-group-item-success">{!! \Session::get('updated') !!}</span>

                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart->items as $product )
                                        <tr>
                                            <td class="li-product-remove">
                                                <a href="{{ route('deleteFromCart' , $product['item']->id) }}">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
                                            <td class="li-product-thumbnail" style="width: 20%; height:20%;">
                                                <a href="{{ route('HomeProduct.show' , $product['item']->id) }}">
                                                    <img src="{{ asset('images/product/'.$product['item']->image) }}" alt="Li's Product Image" style="
                                                    width: 100%;
                                                    height: 130px;
                                                ">
                                                </a>
                                            </td>
                                            <td class="li-product-name">
                                                <a href="{{ route('HomeProduct.show' , $product['item']->id) }}">
                                                    {{ $product['item']->name }}
                                                </a>
                                            </td>
                                            <td class="li-product-price">
                                                <span class="amount">${{ $product['price'] }}</span>
                                            </td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="{{ $product['qty'] }}" type="text" name ="{{'count' . $product['item']->id }}">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">${{ $product['price'] * $product['qty'] }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if ($errors->has('count' . $product['item']->id))

                                                    <span class="list-group-item list-group-item-danger"> {{ $errors->first('count' . $product['item']->id) }} </span>

                                            @elseif(Session::has('Error in' . $product['item']->id))

                                                    <span class="list-group-item list-group-item-danger"> {{ Session('Error in' . $product['item']->id) }} </span>

                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>${{ $cart->totalPrice }}</span></li>
                                        <li>Total <span>${{ $cart->totalPrice }}</span></li>
                                    </ul>
                                    <a href="{{ route('checkout.index') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

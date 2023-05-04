@extends('layouts.master')

@section('title' , 'WishList')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="wishlist-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-stock-status">Stock Status</th>
                                        <th class="li-product-add-cart">add to cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlist as $wish )
                                    <tr>
                                        <form action="{{ route('WishList.destroy' , $wish->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                             <td class="li-product-remove"><button type="submit" style="
                                                border: 0px;
                                                background: inherit;
                                                cursor: pointer;
                                            "><i class="fa fa-times"></i></button></td>
                                        </form>
                                        <td class="li-product-thumbnail" style="width: 20%; height:20%;"><a href="{{ route('HomeProduct.show',$wish->product->id) }}"><img src="{{ asset('images/product/'.$wish->product->image) }}" alt=""style="
                                            width: 100%;
                                            height: 130px;
                                        "></a></td>
                                        <td class="li-product-name"><a href="{{ route('HomeProduct.show',$wish->product->id) }}">{{ $wish->product->name }}</a></td>
                                        <td class="li-product-price"><span class="amount">{{ $wish->product->NewPrice }}</span></td>
                                        <td class="li-product-stock-status">
                                            @if($wish->product->avaliable)
                                                <span class="in-stock"> In Stock
                                            @else
                                                <span class="out-stock">out Stock
                                            @endif
                                        </span></td>
                                        <td class="li-product-add-cart"><a href="#">add to cart</a></td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

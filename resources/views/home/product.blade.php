@extends('layouts.master')

@section('title' , 'Product')

@section('content')

<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
               <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="{{ asset('images/product/'.$product->image) }}" data-gall="myGallery">
                                <img src="{{ asset('images/product/'.$product->image) }}" alt="product image">
                            </a>
                        </div>

                    </div>

                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{ $product->name }}</h2>


                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">${{ $product->NewPrice }}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>
                                    {{ $product->discription }}
                                </span>
                            </p>
                        </div>

                        <div class="single-add-to-cart">
                            <form action="{{ route('addManyToCart' , $product->id) }}" class="cart-quantity" method="POST">
                                @csrf
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text" name="count">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>

                                </div>
                                <button class="add-to-cart" type="submit">Add to cart</button>
                                    @if ($errors->has('count'))

                                        <li class="list-group-item list-group-item-danger"> {{ $errors->first('count') }} </li>

                                    @endif
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <form action="{{ route('WishList.store' , $product->id) }}" method="POST">
                                @csrf
                                <button class="wishlist-btn" type="submit" style="
                                border: 0px;
                                background: inherit;
                                cursor: pointer;
                            "><i class="fa fa-heart-o"></i>Add to wishlist</a></button>
                            </form>
                            <div class="product-social-sharing pt-25">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->

<!-- Begin Li's Laptop Product Area -->
@if (count($similar_products) > 1)
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>other products in the same category:</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="special-product-active owl-carousel">
                        @foreach ($similar_products as $similar_product )
                                @if ($similar_product->id != $product->id)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('HomeProduct.show' , $similar_product['id']) }}">
                                                <img src="{{ asset('images/product/'.$similar_product['image']) }}" alt="Li's product Image" style="height: 200px;">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="{{ route('HomeShop.show' , $similar_product->category->id) }}">
                                                            {{ $similar_product->category->name }}
                                                        </a>
                                                    </h5>
                                                </div>
                                                <h4><a class="product_name" href="{{ route('HomeProduct.show' , $similar_product['id']) }}">
                                                    {{ $similar_product['name'] }}
                                                </a></h4>
                                            @if ( $similar_product['discount'] )
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">${{ $similar_product['NewPrice'] }}</span>
                                                    <span class="old-price">${{ $similar_product['OldPrice'] }}</span>
                                                    <span class="discount-percentage">-{{ $similar_product['discount' ]}}%</span>
                                                </div>
                                            @else
                                                <div class="price-box">
                                                    <span class="new-price">${{ $similar_product['OldPrice'] }}</span>
                                                </div>
                                            @endif
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="{{ route('addToCart' , ['id' => $similar_product->id , 'count' => 1]) }}">Add to cart</a></li>
                                                    <li>
                                                        <form action="{{ route('WishList.store' , $similar_product->id) }}" method="POST">
                                                            @csrf
                                                            <button class="links-details" type="submit" style="
                                                            border: 0px;
                                                            background: inherit;
                                                            cursor: pointer;
                                                        "><i class="fa fa-heart-o"></i></button>
                                                        </form>
                                                    </li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>

                                @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>
@endif


@endsection

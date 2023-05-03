@extends('layouts.master')

@section('title','3omda Store')


@section('content')

    <div class="slider-with-banner">
        <div class="container">
            <div class="row">
                <!-- Begin Category Menu Area -->
                <div class="col-lg-3">
                    <!--Category Menu Start-->
                    <div class="category-menu">
                        <div class="category-heading">
                            <h2 class="categories-toggle"><span>categories</span></h2>
                        </div>
                        <div id="cate-toggle" class="category-menu-list">

                            <ul>

                                @foreach ( $categories as $category )

                                    <li><a href="{{ route('show-products' , $category['id']) }}">
                                        {{ $category['name'] }}
                                    </a></li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!--Category Menu End-->
                </div>
                <!-- Category Menu Area End Here -->
                <!-- Begin Slider Area -->
                <div class="col-lg-9">
                    <div class="slider-area pt-sm-30 pt-xs-30">
                        <div class="slider-active owl-carousel">
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-02 bg-4">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                    <h2>Chamcham Galaxy S9 | S9+</h2>
                                    <h3>Starting at <span>$589.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-01 bg-5">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                    <h2>Work Desk Surface Studio 2018</h2>
                                    <h3>Starting at <span>$1599.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-02 bg-6">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                    <h2>Phantom 4 Pro+ Obsidian</h2>
                                    <h3>Starting at <span>$809.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Slider Area End Here -->
            </div>
        </div>
    </div>
    <!-- Slider With Category Menu Area End Here -->
    <!-- Begin Li's Static Banner Area -->
    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
        <div class="container">
            <div class="row">
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner pb-xs-30">
                        <a href="#">
                            <img src="images/banner/1_3.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner pb-xs-30">
                        <a href="#">
                            <img src="images/banner/1_4.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-banner">
                        <a href="#">
                            <img src="images/banner/1_5.jpg" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Static Banner Area End Here -->
    <!-- Begin Li's Special product Area -->

    <section class="product-area li-laptop-product Special-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Hot Deals products</span>
                        </h2>
                    </div>

                    <div class="row">
                        <div class="special-product-active owl-carousel">
                            @foreach ($Allproducts as $product )

                                @if ( $product['discount'] )

                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('show-products' , $product['id']) }}">
                                                    <img src="{{ asset('images/product/'.$product['image']) }}" alt="Li's product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{ route('show-products' , $product['id']) }}">
                                                                {{ $product['discription'] }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('show-products' , $product['id']) }}">
                                                        {{ $product['name'] }}
                                                    </a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2">${{ $product['NewPrice'] }}</span>
                                                        <span class="old-price">${{ $product['OldPrice'] }}</span>
                                                        <span class="discount-percentage">-{{ $product['discount' ]}}%</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                        <li><a class="links-details" href="{{ route('test') }}"><i class="fa fa-heart-o"></i></a></li>
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
    <!-- Li's Special product Area End Here -->
    <!-- Begin Li's Laptops product | Home V2 Area -->

    @foreach ($categories as $category )
        <section class="product-area li-laptop-product li-laptop-product-2 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>{{ $category['name'] }}</span>
                            </h2>
                        </div>

                        <div class="li-banner-2 pt-15">
                            <div class="row">
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-banner">
                                        <a href="#">
                                            <img src="images/banner/2_1.jpg" alt="Li's Static Banner">
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-banner pt-xs-30">
                                        <a href="#">
                                            <img src="images/banner/2_2.jpg" alt="Li's Static Banner">
                                        </a>
                                    </div>
                                </div>
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="special-product-active owl-carousel">
                                @foreach ($category->products as $product )
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{ route('show-products' , $product['id']) }}">
                                                        <img src="{{ asset('images/product/'.$product['image']) }}" alt="Li's product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="{{ route('test' , ['id' => $product['id']]) }}">
                                                                    {{ $product['discription'] }}
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <h4><a class="product_name" href="{{ route('test' , ['id' => $product['id']]) }}">
                                                            {{ $product['name'] }}
                                                        </a></h4>
                                                    @if ( $product['discount'] )
                                                        <div class="price-box">
                                                            <span class="new-price new-price-2">${{ $product['NewPrice'] }}</span>
                                                            <span class="old-price">${{ $product['OldPrice'] }}</span>
                                                            <span class="discount-percentage">-{{ $product['discount' ]}}%</span>
                                                        </div>
                                                    @else
                                                        <div class="price-box">
                                                            <span class="new-price">${{ $product['OldPrice'] }}</span>
                                                        </div>
                                                    @endif
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                            <li><a class="links-details" href="{{ route('test') }}"><i class="fa fa-heart-o"></i></a></li>
                                                            <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>




                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>

    @endforeach

    <!-- Li's Laptops product | Home V2 Area End Here -->

@endsection

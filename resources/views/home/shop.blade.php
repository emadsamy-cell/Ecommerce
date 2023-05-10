@extends('layouts.master')

@section('title' , 'Shop')

@section('content')
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="{{ asset('images/bg-banner/2.jpg') }}" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>

                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select">
                                <option value="trending">Relevance</option>
                                <option value="sales">Name (A - Z)</option>
                                <option value="sales">Name (Z - A)</option>
                                <option value="rating">Price (Low &gt; High)</option>
                                <option value="date">Rating (Lowest)</option>
                                <option value="price-asc">Model (A - Z)</option>
                                <option value="price-asc">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('HomeProduct.show' , $product['id']) }}">
                                                    <img src="{{ asset('images/product/'.$product['image']) }}" alt="Li's product Image" style="height: 200px;">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{ route('HomeShop.show' , $product->category->id) }}">
                                                                {{ $product->category->name }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('HomeProduct.show' , $product['id']) }}">
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
                                                        <li class="add-cart active"><a href="{{ route('addToCart' , ['id' => $product->id , 'count' => 1]) }}">Add to cart</a></li>
                                                        <li>
                                                            <form action="{{ route('WishList.store' , $product->id) }}" method="POST">
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
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div id="list-view" class="tab-pane product-list-view fade" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    @foreach ($products as $product)
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="{{ route('HomeProduct.show' , $product['id']) }}">
                                                    <img src="{{ asset('images/product/'.$product->image) }}" alt="Li's Product Image" style="height: 200px;">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="{{ route('HomeShop.show' , $product->category->id) }}">{{ $product->category->name }}</a>
                                                        </h5>

                                                    </div>
                                                    <h4><a class="product_name" href="{{ route('HomeProduct.show' , $product['id']) }}">{{ $product->name }}</a></h4>
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
                                                    <p>{{ $product->discription }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart"><a href="{{ route('addToCart' , ['id' => $product->id , 'count' => 1]) }}">Add to cart</a></li>
                                                    <li>
                                                        <form action="{{ route('WishList.store' , $product->id) }}" method="POST">
                                                            @csrf
                                                            <button class="links-details" type="submit" style="
                                                            border: 0px;
                                                            background: inherit;
                                                            cursor: pointer;
                                                        "><i class="fa fa-heart-o"></i></button>
                                                        </form>
                                                    </li>
                                                    <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Showing 1-12 of 13 item(s)</p>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="pagination-box">
                                        <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                          <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
        </div>
    </div>
</div>
@endsection

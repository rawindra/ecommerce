@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.slider')
<section class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="/frontend/assets/img/icons/1.png" alt="#" />
                    </div>
                    <h2>Fast Secure Payments</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="/frontend/assets/img/icons/2.png" alt="#" />
                    </div>
                    <h2>Premium Products</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="/frontend/assets/img/icons/3.png" alt="#" />
                    </div>
                    <h2>Free & fast Delivery</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2>FEATURED PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($fProducts as $product)
            <div class="product-item">
                <div class="pi-pic">
                    <a href="{{ route('product.show', $product->id) }}"><img
                            src="{{ asset('uploads/images/products/thumb/'.$product->main_image) }}"
                            alt="{{$product->name}}" /></a>
                    <div class="pi-links">

                        <a href="{{ route('product.show', $product->id) }}" class="add-card"><i
                                class="flaticon-bag"></i><span>ADD TO CART</span></a>
                    </div>
                </div>
                <div class="pi-text">
                    <a href="#">{{$product->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="top-letest-product-section">
    <div class="container">
        <div class="section-title">
            <h2>LATEST PRODUCTS</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach ($lProducts as $product)
            <div class="product-item">
                <div class="pi-pic">
                    <a href="{{ route('product.show', $product->id) }}"><img
                            src="{{ asset('uploads/images/products/thumb/'.$product->main_image) }}"
                            alt="{{$product->name}}" /></a>
                    <div class="pi-links">

                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                    </div>
                </div>
                <div class="pi-text">
                    <a href="{{ route('product.show', $product->id) }}">{{$product->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
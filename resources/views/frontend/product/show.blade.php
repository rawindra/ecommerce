@extends('frontend.layouts.app')

@section('content')

<!-- Page info -->
<div class="page-top-info">
    <div class="container">
        <h4>Category PAge</h4>
        <div class="site-pagination">
            <a href="">Home</a> /
            <a href="">Shop</a>
        </div>
    </div>
</div>
<!-- Page info end -->


<!-- product section -->
<section class="product-section">
    <div class="container">
        <div class="back-link">
            <a href="#"> &lt;&lt; Back to Category</a>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="product-pic-zoom">
                    <img class="product-big-img" src="{{asset('uploads/images/products/main/'.$product->main_image)}}"
                        alt="{{$product->name}}">
                </div>
            </div>
            <div class="col-lg-6 product-details">
                <h2 class="p-title">{{$product->name}}</h2>
                <h3 class="p-price" id="productPrice">
                    {{ $product->price }}</h3>
                <h4 class="p-stock">Available:
                    <span id="availability">In Stock</span></h4>
                <div class="p-rating">
                    <i class="fa fa-star-o fa-fade"></i>
                    <i class="fa fa-star-o fa-fade"></i>
                    <i class="fa fa-star-o fa-fade"></i>
                    <i class="fa fa-star-o fa-fade"></i>
                    <i class="fa fa-star-o fa-fade"></i>
                </div>
                <div class="p-review">
                    <a href="">2 reviews</a>|<a data-toggle="modal" data-target="#exampleModal"
                        style="cursor:pointer">Add your
                        review</a>
                </div>
                <div class="fw-size-choose">
                    <h5>
                        {{-- <span class="badge badge-secondary variant" style="cursor:pointer"> --}}
                            {{-- @foreach ($variantValues as $value)
                            @foreach ($value->main_attr_value as $key =>$val)
                            @php
                            $attribute = App\Models\ProductAttribute::where('id',$key)->get();

                            $attributeValue = App\Models\ProductAttributeValue::where('id',$val)->get();
                            @endphp
                            @foreach($attribute as $attr)
                            <b>{{ $attr->attr_name }}:</b>
                            @endforeach
                            @foreach($attributeValue as $attrVal)
                            <b>{{ $attrVal->values }}</b>
                            <br>
                            @endforeach
                            @endforeach
                            @endforeach --}}
                            @php
                                $attributesArray = App\Models\ProductVariant::where('product_id', $product->id)->select('attr_name')->groupBy('attr_name')->pluck('attr_name')->toArray();
                            @endphp
                            @foreach ($attributesArray as $attr_id)
                                @php 
                                    $attribute = App\Models\ProductAttribute::findorfail($attr_id); 
                                    $attributesValueArray = App\Models\ProductVariant::where('product_id', $product->id)->where('attr_name', $attribute->id)->select('attr_value')->groupBy('attr_value')->pluck('attr_value')->toArray();
                                @endphp
                                
                                    <span class="badge badge-secondary variant" style="cursor:pointer">
                                        {{$attribute->attr_name}}
                                    </span>
                                    
                                            @php 
                                                $attributeVariants =  App\Models\ProductVariantValue::where('product_id', $product->id)->select('main_attr_value')->pluck('main_attr_value')->toArray();
                                                $attrKey = array_values(array_unique((array_map(function($key) use ($attribute) {
                                                    return $key[$attribute->id];
                                                },$attributeVariants))));
                                                
                                                $attributeValues = App\Models\ProductAttributeValue::whereIn('id', $attrKey)->select('id', 'values')->pluck('values','id')->toArray();                
                                            @endphp
                                            <select name="attribute_values[]">
                                                @foreach($attributeValues as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                    
                                    <br>
                            @endforeach

                        {{-- </span> --}}
                    </h5>
                </div>
                <a id="addToCart" href="#" class="site-btn">Add To
                    Cart</a>
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                            <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                aria-expanded="true" aria-controls="collapse1">information</button>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so
                                    dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus.
                                    Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                <p>Approx length 66cm/26" (Based on a UK size 8 sample)</p>
                                <p>Mixed fibres</p>
                                <p>The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5'8"</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingTwo">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse2"
                                aria-expanded="false" aria-controls="collapse2">care details </button>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="panel-body">
                                <img src="./img/cards.png" alt="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so
                                    dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus.
                                    Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingThree">
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse3"
                                aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="panel-body">
                                <h4>7 Days Returns</h4>
                                <p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so
                                    dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus.
                                    Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-sharing">
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-pinterest"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->

<!-- modal section  -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="#" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Review</label>
                        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <select name="rating" class="form-control">
                            <option value="1">1 star</option>
                            <option value="2">2 star</option>
                            <option value="3">3 star</option>
                            <option value="4">4 star</option>
                            <option value="5">5 star</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Create Review</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- modal section end -->

@endsection
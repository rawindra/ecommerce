@extends('backend.layouts.app')
@section('content')
<div class="card">
    <div class="card-header with-border">
        <div class="card-title">
            Add Product Variant For <b>{{ $product->name }}</b>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <!-- Nav tabs -->
                    <form enctype="multipart/form-data"
                        action="{{ route('admin.product.variant.values.store',$product->id) }}" method="POST">
                        {{ csrf_field() }}
                        <ul class="nav nav-tabs" id="variantValuesTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="addVariant-tab" data-toggle="tab" href="#addVariant"
                                    role="tab" aria-controls="addVariant" aria-selected="true">Add variant</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pricing-tab" data-toggle="tab" href="#pricing" role="tab"
                                    aria-controls="pricing" aria-selected="true">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab"
                                    aria-controls="inventory" aria-selected="true">Inventory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab"
                                    aria-controls="images" aria-selected="true">Images</a>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" id="variantValuesTab">

                            @include('backend.product_variant_values.variant_values_tab')
                            @include('backend.product_variant_values.pricing_values_tab')
                            @include('backend.product_variant_values.inventory_values_tab')
                            @include('backend.product_variant_values.images_values_tab')
                        </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('admin.product.variant.values.index',$product->id) }}"
                        class="float-right btn btn-md btn-default margin-left-15">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                        Back
                    </a>
                    <button type="submit" class="float-right btn btn-md btn-primary"><i class="fa fa-plus"></i> Add
                        Stock
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
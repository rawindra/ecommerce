@extends('backend.layouts.app')
@section('content')
<div class="card">
    <div class="card-header with-border">
        <div class="card-title">
            Edit Product Variant For <b>{{ $proVarVal->product->name }}</b>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <!-- Nav tabs -->
                    <form enctype="multipart/form-data"
                        action="{{ route('admin.product.variant.values.update',$proVarVal->id) }}" method="POST">
                        {{ csrf_field() }}
                        <ul class="nav nav-tabs" id="variantEditValuesTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="editVariant-tab" data-toggle="tab" href="#editVariant"
                                    role="tab" aria-controls="editVariant" aria-selected="true">Add variant</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="editPricing-tab" data-toggle="tab" href="#editPricing"
                                    role="tab" aria-controls="editPricing" aria-selected="true">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="editInventory-tab" data-toggle="tab" href="#editInventory"
                                    role="tab" aria-controls="editInventory" aria-selected="true">Inventory</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="editImages-tab" data-toggle="tab" href="#editImages" role="tab"
                                    aria-controls="editImages" aria-selected="true">Images</a>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content" id="variantEditValuesTab">

                            @include('backend.product_variant_values.edit_variant_values')
                            @include('backend.product_variant_values.edit_pricing_values')
                            @include('backend.product_variant_values.edit_inventory_values')
                            @include('backend.product_variant_values.edit_images_values')
                        </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('admin.product.variant.values.index',$proVarVal->product->id) }}"
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
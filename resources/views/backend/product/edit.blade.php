@extends('backend.layouts.app')
@section('title','Edit Product')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Edit Product</h5>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-success" style="float: right">Go
                            Back</a>
                    </div>
                    <form action="{{route('admin.product.update',$product->id)}}" method="POST"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        Product Name: <span class="text-danger">*</span>
                                    </label>
                                    <input required placeholder="Please enter product name" type="text" autofocus=""
                                        name="name" value="{{ old('name',$product->name) }}" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label>
                                        Category: <span class="text-danger">*</span>
                                    </label>
                                    <select required name="category_id" id="parentCategory"
                                        class="form-control select2">
                                        <option value="">Please Select</option>
                                        @foreach($parCats as $pCat)
                                        <option value="{{$pCat->id}}"
                                            {{ $pCat->id == $product->category_id ? 'selected':'' }}> {{$pCat->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="last_btn col-md-4">
                                    <label>
                                        Subcategory: <span class="text-danger">*</span>
                                    </label>
                                    <select required="" name="subcat_id" id="subCategory" class="select2 form-control">
                                        @foreach($subCats as $sCat)
                                        <option value="{{$sCat->id}}"
                                            {{ $sCat->id == $product->subcat_id ? 'selected':'' }}> {{$sCat->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="last_btn col-md-4">
                                    <label>
                                        Child Category:
                                    </label>
                                    <select name="childcat_id" id="childCategory" class="select2 form-control">
                                        <option value="">Please Select</option>
                                        @foreach($childCats as $cCat)
                                        <option value="{{$cCat->id}}"
                                            {{ $cCat->id == $product->subcat_id ? 'selected':'' }}> {{$cCat->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="">Image</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            @if($product->main_image)
                                            <img src="{{ asset('uploads/images/products/thumb/'.$product->main_image) }}"
                                                alt="{{$product->name}}" height="150" width="150" />
                                            @else
                                            <img src="https://via.placeholder.com/200x150?text=No+Image"
                                                alt="{{$product->name}}">
                                            @endif
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                            style="max-width: 200px; max-height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select
                                                    image</span><span class="fileinput-exists">Change</span><input
                                                    type="file" name="main_image"></span>
                                            <a href="#" class="btn btn-default fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>

                                    <div class="margin-top-15 col-md-12">
                                        <label>
                                            Key Features :
                                        </label>
                                        <textarea class="form-control" id="featureEditor" name="key_features">{{ old('key_features',$product->key_features) }}
                                    </textarea>
                                    </div>

                                    <div class="margin-top-15 col-md-12">
                                        <label>
                                            Description:
                                        </label>
                                        <textarea id="desEditor" name="des">{{ old('des',$product->des) }}</textarea>
                                    </div>

                                    <div class="margin-top-15 col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>
                                                    Model:
                                                </label>

                                                <input type="text" name="model" class="form-control"
                                                    placeholder="Please Enter Model Number"
                                                    value="{{ old('model',$product->model) }}">
                                            </div>

                                            <div class="col-md-6">
                                                <label>
                                                    SKU:
                                                </label>
                                                <input type="text" name="sku" value="{{ old('sku',$product->sku) }}"
                                                    placeholder="Please enter SKU" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="margin-top-15 col-md-6">
                                        <label>
                                            Price: <span class="text-danger">*</span>
                                        </label>
                                        <input pattern="[0-9]+(\.[0-9][0-9]?)?"
                                            title="Price Format must be in this format : 200 or 200.25" required
                                            type="text" name="price" value="{{ old('price',$product->price) }}"
                                            placeholder="Please enter product price" class="form-control">
                                        <br>
                                        <small class="text-muted"><i class="fa fa-question-circle"></i> Don't put comma
                                            whilt entering PRICE</small>
                                    </div>

                                    <div class="margin-top-15 col-md-6">
                                        <label>
                                            Offer Price:
                                        </label>
                                        <input title="Offer price Format must be in this format : 200 or 200.25"
                                            pattern="[0-9]+(\.[0-9][0-9]?)?" type="text" name="offer_price"
                                            class="form-control" placeholder="Please enter product offer price"
                                            value="{{ old('offer_price',$product->offer_price) }}">
                                        <br>
                                        <small class="text-muted"><i class="fa fa-question-circle"></i>
                                            Don't put comma whilt entering OFFER price
                                        </small>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="col-md-4 btn btn-block btn-primary">
                                    Update Product
                                </button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4'
         })
        $('#featureEditor').summernote();
        $('#desEditor').summernote();

    });
</script>
<script>
    $( document ).ready(function() {
        $('#parentCategory').change(function() {
           var parentCategoryId = $(this).val();
           console.log(parentCategoryId);
           if(parentCategoryId){
            $.ajax({
                url: "/admin/search/subcategory/"+parentCategoryId,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    console.log(res);
                    $('#subCategory').html(res);

                }
            });
           }
        });
        $('#subCategory').change(function() {
           var subCategoryId = $(this).val();
           console.log(subCategoryId);
           if(subCategoryId){
            $.ajax({
                url: "/admin/search/childcategory/"+subCategoryId,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    console.log(res);
                    $('#childCategory').html(res);

                }
            });
           }
        });
    });
</script>
@endsection
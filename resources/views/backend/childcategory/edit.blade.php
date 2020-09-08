@extends('backend.layouts.app')
@section('title','Edit ChildCategory')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Edit ChildCategory</h5>
                        <a href="{{ route('admin.childcategory.index') }}" class="btn btn-success"
                            style="float: right">Go
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.childcategory.update',$childCategory->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Parent Category</label>
                                <select name="parent_id" class="form-control" id="parentCategory">
                                    @foreach ($parentCategories as $pcat)
                                    <option value="{{ $pcat->id }}"
                                        {{ $childCategory->parent_id == $pcat->id ? 'selected':'' }}>{{ $pcat->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select name="subcat_id" class="form-control" id="subCategory">
                                    @foreach ($subCategories as $scat)
                                    <option value="{{ $scat->id }}"
                                        {{ $childCategory->subcat_id == $scat->id ? 'selected':'' }}>{{ $scat->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Child Category Name</label>
                                <input type="text" name="title" value="{{old('title',$childCategory->title)}}"
                                    class="form-control" placeholder="enter child category title">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update ChildCategory</button>
                            </div>
                        </form>
                    </div>
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
    });
</script>
@endsection
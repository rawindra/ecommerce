@extends('backend.layouts.app')
@section('title','Create ChildCategory')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Create ChildCategory</h5>
                        <a href="{{ route('admin.childcategory.index') }}" class="btn btn-success"
                            style="float: right">Go
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.childcategory.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Parent Category</label>
                                <select name="parent_id" class="form-control" id="parentCategory">
                                    <option value="">Select Parent Category...</option>
                                    @foreach ($parentCategories as $pcat)
                                    <option value="{{ $pcat->id }}">{{ $pcat->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <select name="subcat_id" class="form-control" id="subCategory">
                                    <option value="">Select Parent First...</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Child Category Name</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control"
                                    placeholder="enter child category title">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create ChildCategory</button>
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
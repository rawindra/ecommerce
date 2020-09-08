@extends('backend.layouts.app')
@section('title','Create SubCategory')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Create SubCategory</h5>
                        <a href="{{ route('admin.subcategory.index') }}" class="btn btn-success" style="float: right">Go
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.subcategory.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Parent Category</label>
                                <select name="parent_id" class="form-control">
                                    @foreach ($parentCategories as $pcat)
                                    <option value="{{ $pcat->id }}">{{ $pcat->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control"
                                    placeholder="enter subcategory title">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create SubCategory</button>
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
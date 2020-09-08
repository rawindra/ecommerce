@extends('backend.layouts.app')
@section('title','Create Category')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Create Category</h5>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-success" style="float: right">Go
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="title" value="{{old('name')}}" class="form-control"
                                    placeholder="enter category title">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create Category</button>
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
@extends('backend.layouts.app')
@section('title','Categories')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">All Categories</h5>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success"
                            style="float: right">+Create Category</a>
                    </div>
                    <div class="card-body">
                        <table id="allCategories" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$loop->index +1 }}</td>
                                    <td>{{$category->title}}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.category.status.update',$category->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                class="btn btn-xs {{ $category->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $category->status==1 ? 'Active' : 'Deactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.category.edit',$category->id)}}"
                                            class="btn btn-xs btn-primary btn-flat">Edit</a>
                                        <form action="{{route('admin.category.destroy',$category->id)}}"
                                            onsubmit="return confirm('Do you really want to delete?');"
                                            style="display: inline-block" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>

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
    $(function () {
    $('#allCategories').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
    })
})
</script>
@endsection
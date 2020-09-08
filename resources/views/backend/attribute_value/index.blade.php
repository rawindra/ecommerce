@extends('backend.layouts.app')
@section('title','Attribute Values')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Attribute Values for : <b>{{ $proAttr->attr_name }}</b></h5>
                        <a href="{{ route('admin.attribute.index') }}" class="btn btn-secondary" style="float: right">Go
                            Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="{{ route('admin.attribute_value.store',$proAttr->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Attribute Value:</label>
                                        <input type="text" name="values" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create Value</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($proAttrValues as $value)
                                        <tr>
                                            <td>{{$loop->index +1 }}</td>
                                            <td>{{$value->values }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#editModal{{ $value->id }}">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" align="center">
                                                <p>No values found</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

@foreach($proAttrValues as $proval)
<!-- Modal for Edit-->

<div id="editModal{{ $proval->id }}" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <!-- Modal content-->
        <form action="{{ route('admin.attribute_value.update',$proval->id) }}" method="POST">
            @csrf
            <input type="hidden" name="attr_id" value="{{ $proAttr->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    Edit Value: <b>{{ $proval->values }}</b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Edit Value:</label>
                        <input type="text" placeholder="Enter value" class="form-control" name="values"
                            value="{{ $proval->values }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--END-->
@endforeach
@endsection
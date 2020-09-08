@extends('backend.layouts.app')
@section('title','Attributes')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">All Attributes</h5>
                        <a href="{{ route('admin.attribute.create') }}" class="btn btn-success"
                            style="float: right">+Create Attribute</a>
                    </div>
                    <div class="card-body">
                        <table id="allCategories" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Attributes</th>
                                    <th>Values</th>
                                    <th>Categories</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proAttr as $pAttr)
                                <tr>
                                    <td>{{$loop->index +1 }}</td>
                                    <td>
                                        {{$pAttr->attr_name}}
                                        <p></p>
                                        <a href="{{ route('admin.attribute.edit',$pAttr->id) }}">Edit Option</a>
                                    </td>
                                    <td>
                                        @forelse ($pAttr->proAttrValues as $value)
                                        {{ $value->values }},
                                        @empty
                                        <p>No values found</p>
                                        @endforelse
                                        <p></p>
                                        <a href="{{ route('admin.attribute_value.index',$pAttr->id) }}">Manage
                                            Values</a>
                                    </td>
                                    <td>
                                        @foreach($pAttr->cats_id as $catId)
                                        @php
                                        $getcatname = App\Models\Category::where('id',$catId)->first();
                                        @endphp
                                        {{ isset($getcatname) ? $getcatname->title : "-" }},
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Attributes</th>
                                    <th>Values</th>
                                    <th>Categories</th>
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
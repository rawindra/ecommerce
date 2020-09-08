@extends('backend.layouts.app')
@section('title','All Variants Values of Product')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Add Variant Values for: <b>{{ $product->name }}</b></h5>
                        <a href="{{ route('admin.product.variant.values.create', $product->id) }}"
                            class="btn btn-md btn-primary" style="float: right">
                            ADD Variant Values
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="allVariantValues" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Variant Image</th>
                                    <th>Variant Values</th>
                                    <th>Variant Price</th>
                                    <th>Variant Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variantValues as $value)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td></td>
                                    <td>
                                        <p>
                                            Product Name: <b>{{ $product->name }}</b>
                                        </p>
                                        <p>
                                            Variants:
                                        </p>
                                        @foreach ($value->main_attr_value as $key =>$val)
                                        @php
                                        $attributeValue = App\Models\ProductAttributeValue::where('id',$val)->get();
                                        @endphp
                                        @foreach($attributeValue as $attrVal)
                                        <b>{{ $attrVal->values }}</b>,
                                        @endforeach
                                        @endforeach
                                    </td>
                                    <td>{{ $value->price }}</td>
                                    <td>{{ $value->stock }}</td>
                                    <td>
                                        <a href="{{route('admin.product.variant.values.edit',$value->id)}}"
                                            class="btn btn-xs btn-primary btn-flat">Edit</a>
                                        <form action="{{route('admin.product.variant.values.destroy',$value->id)}}"
                                            onsubmit="return confirm('Do you really want to delete?');"
                                            style="display: inline-block" method="get">
                                            <button type="submit" class="btn btn-xs btn-danger btn-flat">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Variant Image</th>
                                    <th>Variant Values</th>
                                    <th>Variant Price</th>
                                    <th>Variant Stock</th>
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
    $('#allVariantValues').DataTable({
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
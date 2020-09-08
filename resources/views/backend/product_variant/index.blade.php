@extends('backend.layouts.app')
@section('title','All Variants of Product')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Add Variant: <b>{{ $product->name }}</b></h5>
                        <a data-toggle="modal" href="#variantModal" class="btn btn-md btn-primary" style="float: right">
                            ADD Variant
                        </a>
                        <a href="{{ route('admin.product.variant.values.index',$product->id) }}"
                            class="btn btn-md btn-success mr-2" style="float: right">
                            Add Variant Values
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="allVariants" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Variant Name</th>
                                    <th>Variant Values</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productVariants as $key=>$pVar)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>
                                        @php
                                        $attribute = App\Models\ProductAttribute::where('id',$key)->first();
                                        @endphp
                                        {{ $attribute->attr_name }}
                                    </td>
                                    <td>
                                        @foreach($pVar as $var)
                                        {{ $var->attrValue->values }},</>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a data-toggle="modal" href="#variantEditModal" class="btn btn-md btn-primary"
                                            style="float: right">
                                            Edit Variant
                                        </a>
                                        @include('backend.product_variant.edit')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Variant Name</th>
                                    <th>Variant Values</th>
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

@include('backend.product_variant.add')

@endsection
@section('scripts')
<script>
    $(function () {
    $('#allVariants').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
    })
})
</script>
<script>
    $( document ).ready(function() {
        $('#selectAllbox').hide();
    });
</script>
<script>
    $( document ).ready(function() {
        $('#attribute').change(function() {
           var attributeId = $(this).val();
           console.log(attributeId);
           if(attributeId){
            $.ajax({
                url: "/admin/search/attribute/value/"+attributeId,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    console.log(res);
                    $('#selectAllbox').show();
                    $('#attributeValue').html(res);

                }
            });
           }
        });
    });
</script>
<script>
    $('.selectallbox').on('click',function(){
			if($(this).is(':checked')){
				$('input:checkbox').prop('checked', this.checked);
			}else{
				$('input:checkbox').prop('checked', false);
			}
		});
</script>
@endsection
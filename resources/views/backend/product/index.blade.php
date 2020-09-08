@extends('backend.layouts.app')
@section('title','Products')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">All Products</h5>

                        <button type="submit" class="btn btn-danger" id="bulkDelete">BulK Delete</button>

                        <a href="{{ route('admin.product.create') }}" class="btn btn-success" style="float: right">+
                            Create Product</a>
                    </div>
                    <div class="card-body">
                        <table id="allProducts" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <input id="checkboxAll" type="checkbox" value="none" />
                                        <label for="checkboxAll" class="material-checkbox">Mark All</label>
                                    </th>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="filled-in" name="product_checkbox[]"
                                            class='product_checkbox' value="{{ $product->id }}" />
                                    </td>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/images/products/thumb/'.$product->main_image) }}"
                                            alt="{{$product->name}}" height="150" width="150" />
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <p><b>Parent Category</b>:{{ $product->category->title }},</p>
                                        <p><b>Sub Category</b>:{{ $product->subCategory->title }},</p>
                                        <p><b>Child
                                                Category</b>:{{ $product->childCategory != null ? $product->childCategory->title:'--' }}
                                        </p>
                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.product.feature.update',$product->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                class="btn btn-xs {{ $product->featured ==1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $product->featured==1 ? 'featured' : 'NotFeatured' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('admin.product.status.update',$product->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                class="btn btn-xs {{ $product->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                                {{ $product->status==1 ? 'Active' : 'Deactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.product.variant.values.index',$product->id) }}">View
                                                    All Variants</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.product.variant.index',$product->id) }}">Add
                                                    Variants</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.product.edit',$product->id) }}">Edit
                                                    product</a>
                                                <form action="{{ route('admin.product.destroy',$product->id) }}"
                                                    onsubmit="return confirm('Do you really want to delete?');"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-flat form-control">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>MarkALL</th>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Actions</th>
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

@endsection
@section('scripts')
<script>
    $(function () {
    $('#allProducts').DataTable({
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ],
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
    $('#checkboxAll').on('click',function(){
			if($(this).is(':checked')){
				$('input:checkbox').prop('checked', this.checked);
			}else{
				$('input:checkbox').prop('checked', false);
			}
        });

    $('#bulkDelete').click(function(){
        var id = [];
        if(confirm("Are you sure to deleted??")){
            $('input:checked').each(function(){
                var selectedId = $(this).val();
                if(selectedId != 'none'){
                    id.push(selectedId)
                }
            })
            if(id.length > 0){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.product.bulk.delete') }}",
                    method: "post",
                    data: { id:id},
                    success:function(data){
                        alert(data)
                        location.reload();
                    }
                })
            }else{
                alert('Please check at least one checkbox')
            }
            console.log(id)
        }
    })
</script>
@endsection
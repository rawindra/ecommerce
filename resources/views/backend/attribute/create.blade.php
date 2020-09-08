@extends('backend.layouts.app')
@section('title','Create Attribute')
@section('content')
<!-- Main content -->
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0" style="float: left">Create Attribute</h5>
                        <a href="{{ route('admin.attribute.index') }}" class="btn btn-success" style="float: right">Go
                            Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.attribute.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Attribute Name</label>
                                <input type="text" name="attr_name" value="{{old('attr_name')}}" class="form-control"
                                    placeholder="enter attribute name">
                            </div>
                            <div class="form-group">
                                <label for="">Choose Category:</label>
                                <label class="pull-right">
                                    <input type="checkbox" class="selectallbox"> Select All
                                </label>
                            </div>
                            @foreach(App\Models\Category::all() as $cat)

                            <label>
                                <input type="checkbox" name="cats_id[]" value="{{ $cat->id }}">
                                {{ $cat->title }}
                            </label>

                            @endforeach
                    </div>
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
@section('scripts')
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
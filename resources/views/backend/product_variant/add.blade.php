<!-- Add Variant Modal -->
<div class="modal fade" id="variantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product Attributes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.variant.store',$product->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Option Name:</label>
                        <select class="form-control" name="attr_name" id="attribute">
                            <option>Please Choose</option>
                            @foreach($filteredVariants as $var)
                            <option value="{{ $var->id }}">{{$var->attr_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div id="selectAllbox">
                            <label>
                                <input type="checkbox" class="selectallbox"> Select All
                            </label>
                        </div>
                        <label for="">Option Value:</label>
                        <div id="attributeValue">

                        </div>
                    </div>
                    <button class="btn btn-md btn-primary" type="submit">
                        <i class="fa fa-plus"></i> ADD
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--END-->
<!-- Edit Variant Modal -->

<div class="modal fade" id="variantEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product Attributes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.product.variant.update', $product->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="attr_id" value="{{ $attribute->id }}">
                    <div class="form-group">
                        <label for="">Choosed Option Name: {{ $attribute->attr_name }}</label>
                    </div>
                    <div class="form-group">
                        <div>
                            <label>
                                <input type="checkbox" class="selectallbox"> Select All
                            </label>
                        </div>
                        <label for="">Option Value:</label>
                        @php
                        $allValues =
                        App\Models\ProductAttributeValue::where('atrr_id',$key)->get();
                        @endphp
                        @foreach ($allValues as $value)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $value->id }}" name='attr_value[]'
                                id="defaultCheck{{ $value->id }}" @foreach ($productVariants as $key=>$pVar)
                            @foreach($pVar as $var)
                            {{
                                $value->id==$var->attrValue->id ? 'checked':''
                            }}
                            @endforeach
                            @endforeach
                            >
                            <label class="form-check-label" for="defaultCheck{{ $value->id }}">
                                {{ $value->values }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <button class="btn btn-md btn-primary" type="submit">
                        <i class="fa fa-plus"></i> Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--END-->
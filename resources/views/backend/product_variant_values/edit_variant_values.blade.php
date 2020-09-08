<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="editVariant-tab" id="editVariant">
    <div class="card card-info">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <label>
                        Product Attributes:
                    </label>
                </div>
                <div class="col-md-8">
                    @foreach ($productVariants as $key=>$pVar)
                    <div class="card">
                        <div class="card-header with-border">
                            @php
                            $attribute = App\Models\ProductAttribute::where('id',$key)->first();
                            @endphp
                            {{ $attribute->attr_name }}
                            <input type="hidden" name="attr_id[]" value="{{ $attribute->id }}">
                        </div>
                        <div class="card-body">
                            @foreach($pVar as $var)
                            <input type="radio" name="attr_values[{{ $key }}]" value=" {{ $var->attrValue->id }}"
                                @foreach($proVarVal->main_attr_value as $key=>$value)
                            {{ ($var->attrValue->id == $value) ? 'checked':'' }}
                            @endforeach
                            >
                            <label for=""> {{ $var->attrValue->values }}</label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <label>Set Default Variant :
                        <input type="checkbox" name="def">
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" role="tabpanel" aria-labelledby="editInventory-tab" id="editInventory">
    <br>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Add Stock:</label>
            <input type="number" class="form-control" name="stock" placeholder="Enter stock"
                value="{{ old('stock',$proVarVal->stock) }}">
        </div>
    </div>
</div>
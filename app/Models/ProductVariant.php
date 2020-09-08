<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class, 'attr_name', 'id');
    }

    public function attrValue()
    {
        return $this->belongsTo(ProductAttributeValue::class, 'attr_value', 'id');
    }
}

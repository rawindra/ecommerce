<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $guarded = [];

    protected $casts = [
        'cats_id' => 'array'
    ];

    public function proAttrValues()
    {
        return $this->hasMany(ProductAttributeValue::class, 'atrr_id');
    }
}

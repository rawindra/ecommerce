<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariantValue extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'main_attr_id' => 'array',
        'main_attr_value' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

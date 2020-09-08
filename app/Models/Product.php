<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }

    public function childCategory()
    {
        return $this->belongsTo(ChildCategory::class, 'childcat_id');
    }

    public function variants()
    {
        return $this->hasMany('App\Models\ProductVariant', 'product_id');
    }
}

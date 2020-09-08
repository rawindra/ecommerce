<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use App\Models\ProductVariant;
use App\Models\ProductVariantValue;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($productId)
    {
        $product = Product::findOrFail($productId);

        $variantValues = ProductVariantValue::where('product_id', $productId)->get();
        // $test = [];

        // foreach ($variantValues as $value) {
        //     foreach ($value->main_attr_value as $key => $val) {
        //         $attribute = ProductAttribute::where('id', $key)->get();
        //         $attributeValue = ProductAttributeValue::where('id', $val)->get();
        //         foreach ($attribute as $attr) {
        //             // $attr->attr_name;
        //             foreach ($attributeValue as $attrVal) {
        //                 $test[][$attr->attr_name] = $attrVal->values;
        //             }
        //         }
        //     }
        // }
        // dd($test);
        // dd($variantValues);

        return view('frontend.product.show', compact('product', 'variantValues'));
    }
}

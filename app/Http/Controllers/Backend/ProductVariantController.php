<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductVariant;
use App\Models\ProductVariantValue;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $product = Product::findOrfail($productId);
        $proAttributes = ProductAttribute::all();
        $productVariants = ProductVariant::where('product_id', '=', $productId)->get();
        // dd($productVariants);
        $group = $productVariants->groupBy('attr_name');
        $productVariants = $group;
        $productCategoryArray = array();
        $filteredVariants = collect();
        $productCategoryArray[] = $product->category_id;
        $productAttributeCategoryArray = collect();

        foreach ($proAttributes as $value) {
            $productAttributeCategoryArray = $value->cats_id;
            $result = array_intersect($productCategoryArray, $productAttributeCategoryArray);

            if ($result == $productCategoryArray) {
                $filteredVariants->push($value);
            }
        }

        return view('backend.product_variant.index', compact(
            'product',
            'filteredVariants',
            'proAttributes',
            'productVariants'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        foreach ($request->attr_value as $attrVal) {
            $proVarVal = new ProductVariant();
            $proVarVal->product_id = $productId;
            $proVarVal->attr_name = $request->attr_name;
            $proVarVal->attr_value = $attrVal;
            $proVarVal->save();
        }
        session()->flash('success', 'Variant created');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \DB::table("product_variants")->where(['product_id' => $id, 'attr_name' => $request->attr_id])->delete();

        foreach ($request->attr_value as $attrVal) {
            $proVarVal = new ProductVariant();
            $proVarVal->product_id = $id;
            $proVarVal->attr_name = $request->attr_id;
            $proVarVal->attr_value = $attrVal;
            $proVarVal->save();
        }

        session()->flash('success', 'Variant updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

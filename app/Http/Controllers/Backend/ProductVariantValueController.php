<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantValue;
use Illuminate\Http\Request;

class ProductVariantValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $variantValues = ProductVariantValue::where('product_id', $productId)->get();
        return view('backend.product_variant_values.index', compact('product', 'variantValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($productId)
    {
        $productVariants = ProductVariant::where('product_id', '=', $productId)->get();
        // dd($productVariants);
        $group = $productVariants->groupBy('attr_name');
        $productVariants = $group;
        $product = Product::findOrFail($productId);
        return view('backend.product_variant_values.create', compact('product', 'productVariants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $request->validate(
            [
                'attr_values' => 'required',
                'price' => 'required',
                'stock' => 'required'
            ],
            [
                'attr_values.required' => 'Please select a product attributes',
            ]
        );

        $productVariantValue = new ProductVariantValue;
        $productVariantValue->product_id = $productId;
        $productVariantValue->main_attr_id = $request->attr_id;
        $productVariantValue->main_attr_value = $request->attr_values;
        $productVariantValue->price = $request->price;
        $productVariantValue->stock = $request->stock;

        $success = $productVariantValue->save();
        if ($success) {
            session()->flash('success', 'Variant values succesfully added');
        }

        return redirect()->route('admin.product.variant.values.index', $productId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proVarVal = ProductVariantValue::findOrFail($id);
        $productVariants = ProductVariant::where('product_id', '=', $proVarVal->product->id)->get();
        // dd($productVariants);
        $group = $productVariants->groupBy('attr_name');
        $productVariants = $group;
        return view('backend.product_variant_values.edit', compact('proVarVal', 'productVariants'));
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
        $request->validate(
            [
                'attr_values' => 'required',
                'price' => 'required',
                'stock' => 'required'
            ],
            [
                'attr_values.required' => 'Please select a product attributes',
            ]
        );

        $productVariantValue = ProductVariantValue::findOrFail($id);

        $productVariantValue->product_id = $productVariantValue->product_id;
        $productVariantValue->main_attr_id = $request->attr_id;
        $productVariantValue->main_attr_value = $request->attr_values;
        $productVariantValue->price = $request->price;
        $productVariantValue->stock = $request->stock;

        $success = $productVariantValue->save();
        if ($success) {
            session()->flash('success', 'Variant values updated added');
        }

        return redirect()->route('admin.product.variant.values.index', $productVariantValue->product_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productVariantValue = ProductVariantValue::findOrFail($id);
        $success = $productVariantValue->delete();
        if ($success) {
            session()->flash('success', 'Variant values deleted');
        }

        return redirect()->route('admin.product.variant.values.index', $productVariantValue->product_id);
    }
}

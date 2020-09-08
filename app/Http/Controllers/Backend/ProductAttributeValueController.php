<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;

class ProductAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $proAttrValues = ProductAttributeValue::where('atrr_id', '=', $id)->get();
        $proAttr = ProductAttribute::findorfail($id);

        return view('backend.attribute_value.index', compact('proAttr', 'proAttrValues'));
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'values' => 'required|min:1|unique:product_attribute_values,values'
        ]);

        $proAttrValue = ProductAttributeValue::create([
            'values' => $request->values,
            'atrr_id' => $id
        ]);

        if ($proAttrValue) {
            session()->flash('success', 'Attribute Value created successfully');

            return back();
        }
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
        $request->validate([
            'values' => 'required|min:1|unique:product_attribute_values,values,' . $id
        ]);
        $proAttrValue = ProductAttributeValue::findOrFail($id);
        $success = $proAttrValue->update([
            'values' => $request->values,
            'atrr_id' => $request->attr_id
        ]);

        if ($success) {
            session()->flash('success', 'Attribute Value updated successfully');

            return back();
        }
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

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proAttr = ProductAttribute::all();

        return view('backend.attribute.index', compact('proAttr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'attr_name' => 'required|unique:product_attributes,attr_name',
            'cats_id' => 'required'
        ], [
            'cats_id.required' => 'One Category is required atleast !',
            'attr_name.required' => 'Attribute name is required !',
            'attr_name.unique' => 'Attribute Name Already Added !'
        ]);

        $prodAttr = ProductAttribute::create($request->all());

        if ($prodAttr) {
            session()->flash('success', 'Attribute added successfully');

            return redirect()->route('admin.attribute.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proAttr = ProductAttribute::findorfail($id);

        return view('backend.attribute.edit', compact('proAttr'));
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
            'attr_name' => 'required|unique:product_attributes,attr_name,' . $id,
            'cats_id' => 'required'
        ], [
            'cats_id.required' => 'One Category is required atleast !',
            'attr_name.required' => 'Attribute name is required !',
            'attr_name.unique' => 'Attribute Name Already Added !'
        ]);

        $prodAttr = ProductAttribute::findOrfail($id);

        $success = $prodAttr->update($request->all());

        if ($success) {
            session()->flash('success', 'Attribute updated successfully');

            return redirect()->route('admin.attribute.index');
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

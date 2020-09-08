<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::paginate(10);
        return view('backend.subcategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::all();

        return view('backend.subcategory.create', compact('parentCategories'));
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
            'title' => 'required',
            'parent_id' => 'required'
        ], [
            'parent_id.required' => 'Please Select Parent Category'
        ]);

        $subCategory = SubCategory::create($request->all());

        if ($subCategory) {
            \Session::flash('success', 'SubCategory created successfully');
        }
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentCategories = Category::all();

        $subCategory = Subcategory::findOrFail($id);
        return view('backend.subcategory.edit', compact('subCategory', 'parentCategories'));
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
            'title' => 'required',
            'parent_id' => 'required'
        ], [
            'parent_id.required' => 'Please Select Parent Category'
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $success = $subCategory->update($request->all());

        if ($success) {
            \Session::flash('success', 'SubCategory updated successfully');
        }

        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        if (count($subCategory->products) > 0) {
            return back()
                ->with('warning', 'SubCategory cant be deleted as its linked to products !');
        }

        $success = $subCategory->delete();
        if ($success) {
            session()->flash('deleted', 'SubCategory Has Been Deleted');
            return redirect()->route('admin.subcategory.index');
        }
    }

    public function statusUpdate($id)
    {
        $category = SubCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();

        session()->flash('success', 'SubCategory status changed');

        return back();
    }
}

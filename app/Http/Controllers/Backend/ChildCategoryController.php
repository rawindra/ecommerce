<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childCategories = ChildCategory::paginate(10);
        return view('backend.childcategory.index', compact('childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = Category::all();
        $subCategories = SubCategory::all();

        return view('backend.childcategory.create', compact('parentCategories', 'subCategories'));
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
            'parent_id' => 'required',
            'subcat_id' => 'required'
        ], [
            'parent_id.required' => 'Please Select Parent Category',
            'subcat_id.required' => 'Please Select Sub Category'
        ]);

        $childCategory = ChildCategory::create($request->all());

        if ($childCategory) {
            \Session::flash('success', 'SubCategory created successfully');
        }
        return redirect()->route('admin.childcategory.index');
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
        $subCategories = SubCategory::all();

        $childCategory = ChildCategory::findOrFail($id);
        return view('backend.childcategory.edit', compact('childCategory', 'subCategories', 'parentCategories'));
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
            'parent_id' => 'required',
            'subcat_id' => 'required'
        ], [
            'parent_id.required' => 'Please Select Parent Category',
            'subcat_id.required' => 'Please Select Sub Category'
        ]);

        $childCategory = ChildCategory::findOrFail($id);
        $success = $childCategory->update($request->all());

        if ($success) {
            \Session::flash('success', 'Child Category updated successfully');
        }

        return redirect()->route('admin.childcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $childCategory = ChildCategory::findOrFail($id);

        if (count($childCategory->products) > 0) {
            return back()
                ->with('warning', 'SubCategory cant be deleted as its linked to products !');
        }

        $success = $childCategory->delete();
        if ($success) {
            session()->flash('deleted', 'Child Category Has Been Deleted');
            return redirect()->route('admin.childcategory.index');
        }
    }

    public function statusUpdate($id)
    {
        $category = ChildCategory::findOrFail($id);
        $category->status = !$category->status;
        $category->save();

        session()->flash('success', 'Child Category status changed');

        return back();
    }
}

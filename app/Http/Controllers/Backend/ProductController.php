<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class ProductController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required',
            'subcat_id' => 'required',
            'main_image' => 'required',
            'price' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('main_image')) {
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }

        $product = Product::create($data);

        if ($product) {
            \Session::flash('success', 'Product created successfully');

            return redirect()->route('admin.product.index');
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
        $product = Product::findOrFail($id);
        $parCats = Category::all();
        $subCats = SubCategory::all();
        $childCats = ChildCategory::all();

        return view('backend.product.edit', compact('product', 'parCats', 'subCats', 'childCats'));
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
            'name' => 'required',
            'category_id' => 'required',
            'subcat_id' => 'required',
            'main_image' => 'sometimes',
            'price' => 'required'
        ]);

        $data = $request->all();

        $product = Product::findOrFail($id);


        if ($request->hasFile('main_image')) {
            $this->deleteStoredImage($product->main_image);
            $data['main_image'] = $this->uploadImage($data['main_image']);
        }

        $success = $product->update($data);

        if ($success) {
            \Session::flash('success', 'Product updated successfully');

            return redirect()->route('admin.product.index');
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
        $product = Product::findorfail($id);
        $this->deleteStoredImage($product->main_image);
        $success = $product->delete();

        if ($success) {
            \Session::flash('deleted', 'Product deleted successfully');

            return redirect()->route('admin.product.index');
        }
    }

    public function statusUpdate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = !$product->status;
        $product->save();

        session()->flash('success', 'Product status changed');

        return back();
    }

    public function featureUpdate($id)
    {
        $product = Product::findOrFail($id);
        $product->featured = !$product->featured;
        $product->save();

        session()->flash('success', 'Product featured changed');

        return back();
    }

    public function bulkDelete(Request $request)
    {
        $productIds = $request->id;

        foreach ($productIds as $id) {
            $product = Product::findOrFail($id);
            $this->deleteStoredImage($product->main_image);
            $product->delete();
        }

        return 'data deleted';
    }
}

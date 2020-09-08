<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\ProductAttributeValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSubCategories(Request $request)
    {
        $results = SubCategory::where('parent_id', $request->id)->get();
        $output = '';
        if ($results->count() > 0) {
            foreach ($results as $result) {
                $output .= " <option value=''>Please Select Sub Category</option>";
                $output .= " <option value='$result->id'>$result->title</option>";
            }
        } else {
            $output .= " <option value=''>Please Create Sub Category</option>";
        }
        return response()->json($output);
    }

    public function getChildCategories(Request $request)
    {
        $results = ChildCategory::where('subcat_id', $request->id)->get();
        $output = '';
        if ($results->count() > 0) {
            foreach ($results as $result) {
                $output .= " <option value=''>Please Select Child Category</option>";
                $output .= " <option value='$result->id'>$result->title</option>";
            }
        } else {
            $output .= " <option value=''>Please Create Child Category</option>";
        }
        return response()->json($output);
    }

    public function getAttributeValues(Request $request)
    {
        $results = ProductAttributeValue::where('atrr_id', $request->id)->get();
        $output = '';
        if ($results->count() > 0) {
            foreach ($results as $result) {
                $output .= "<div class='form-check'>";
                $output .= "<input class='form-check-input' type='checkbox'
                            name='attr_value[]'
                            value='{$result->id}'
                            id='defaultCheck{$result->id}'>";
                $output .= "<label class='form-check-label' for='defaultCheck{$request->id}'>{$result->values}</label>";
                $output .= "</div>";
            }
        }
        return response()->json($output);
    }
}

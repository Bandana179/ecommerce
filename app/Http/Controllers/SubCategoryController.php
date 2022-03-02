<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function addsubcategory(Request $request){
        $subcategory=new SubCategory;
        $subcategory->uuid=rand();
        $subcategory->category_id=$request->category_id;
        $subcategory->sub_category_name=$request->sub_category_name;
        $result=$subcategory->save();
        if($request){
            return ["Result"=>"subcategory add success"];
        }

    }
}

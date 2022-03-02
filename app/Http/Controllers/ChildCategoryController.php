<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChildCategory;

class ChildCategoryController extends Controller
{
    public function addchildcategory(Request $request){
        $childcategory=new ChildCategory;
        $childcategory->uuid=rand();
        $childcategory->category_id=$request->category_id;
        $childcategory->subcategory_id=$request->subcategory_id;
        $childcategory->child_category_name=$request->child_category_name;
        $result=$childcategory->save();
        if($result){
            return ["Result"=>"Child Category Added success"];
        }

    }
}

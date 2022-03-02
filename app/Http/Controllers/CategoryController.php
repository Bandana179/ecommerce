<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function addcategory(Request $request){
        $category=new Category;
        $category->uuid=rand();
        $category->category_name=$request->name;
        $result=$category->save();
        if($result){
            return ["Result" =>"Category added successfully"];
        }

    }
}

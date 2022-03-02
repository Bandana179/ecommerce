<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function addproduct(Request $request){
        $product=new Product();
        $product->uuid=rand();
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->child_category_id=$request->child_category_id;
        $product->product_name=$request->product_name;
        $product->product_description=$request->product_description;
        if ($request->hasfile('product_image')) {
            $allowedfileExtension=['pdf','jpg','png','jpeg'];
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $file->getClientOriginalName();
            $check=in_array($extension,$allowedfileExtension);
            if($check){
             $file->storeAs('public/uploads/product_image',$filename);
             $file->move('uploads/product_image', $filename);

        }
        $product->product_image=$request->product_image;
        $product->product_price=$request->product_price;
        $result=$product->save();
        if($result){
            return ["Result"=>"product added success"];
        }



   }

    }
}

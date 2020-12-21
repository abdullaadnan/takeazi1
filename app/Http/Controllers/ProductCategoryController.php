<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductCategoryController extends Controller
{
    public function index(){
        $procat=DB::table('product_categories')->get();
        return (['product_categories' => $procat]);
    }
    public function create(Request $request){
        $validator=validator::make($request->all(),[
            'category_name'=>'required',
            'master_category_id'=>'required|integer',
            'shop_id'=>'required|integer',
            'status'=>'required|Boolean',
            ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $procat = DB::table('product_categories')->insertGetId([
            'category_name' =>$request->input('category_name'),
            'master_category_id' =>$request->input('master_category_id'),
            'shop_id' =>$request->input('shop_id'),
            'parent_category_id' =>$request->input('parent_category_id'),
            'image_path' =>$request->input('image_path'),
            'status' =>$request->input('status'),
        ]);
        return response()->json([
            "message" => "product_category added succesfully",
            "id"=>$procat
        ], 201);

    }
    public function update(Request $request, $id)
    {
        $validator=validator::make($request->all(),[
            'category_name'=>'required',
            'master_category_id'=>'required|integer',
            'shop_id'=>'required|integer',
            'status'=>'required|Boolean',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        if (DB::table('product_categories')->where('id', $id)->exists()){
            $procat = DB::table('product_categories')->where('id', $id)->update([
                'category_name' =>$request->input('category_name'),
                'master_category_id' =>$request->input('master_category_id'),
                'shop_id' =>$request->input('shop_id'),
                'parent_category_id' =>$request->input('parent_category_id'),
                'image_path' =>$request->input('image_path'),
                'status' =>$request->input('status'),
                'updated_at'=> Carbon::now()
        ]);
            return response()->json([
                "message" => "product_categories updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "product_categories updation failed"
            ], 404);
        }
    }
    public function SelectById($id)
    {
        if (DB::table('product_categories')->where('id', $id)->exists()) {
            $procat = DB::table('product_categories')->where('id', $id)->get();
            return (['product_categories' => $procat]);
        } else {
            return response()->json([
                "message" => "Product_category with this ID not found"
            ], 404);
        }
    }

}

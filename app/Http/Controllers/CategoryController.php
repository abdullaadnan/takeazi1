<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get();
        return (['categories' => $category]);
    }
    public function create(Request $request){
        $validator=validator::make($request->all(),[
            'category_name'=>'required',
            'category_img'=>'required',
            'parent_category'=>'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $category=DB::table('categories')->insertGetId([
            'category_name' => $request->input('category_name'),
            'category_img' => $request->input('category_img'),
            'parent_category' => $request->input('parent_category'),
        ]);
        return response()->json([
            "message" => "category added succesfully",
            "category_id"=>$category
        ], 201);
    }
    public function update(Request $request,$category_id){
        if (DB::table('categories')->where('category_id', $category_id)->exists()) {
            $validator=validator::make($request->all(),[
                'category_name'=>'required',
                'category_img'=>'required',
                'parent_category'=>'required',
            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $category=DB::table('categories')->where('category_id', $category_id)->update([
                'category_name' => $request->input('category_name'),
                'category_img' => $request->input('category_img'),
                'parent_category' => $request->input('parent_category'),
                'updated_at'=> Carbon::now()
            ]);
            return response()->json([
                "message" => "category updated successfully",
                "category_id"=>"$category_id"
            ], 200);
        }
        else {
            return response()->json([
                "message" => "Category updated failed"
            ], 404);
        }

    }
    public function SelectById($category_id)
    {
        if (DB::table('categories')->where('category_id', $category_id)->exists()) {
            $category = DB::table('categories')->where('category_id', $category_id)->get();
            return (['categories' => $category]);
        } else {
            return response()->json([
                "message" => "Category with this ID not found"
            ], 404);
        }
    }
    public function delete($category_id)
    {
        if (DB::table('categories')->where('category_id', $category_id)->exists()) {
            $category = DB::table('categories')->where('category_id', $category_id)->delete();
            return response()->json([
                "message" => " Category records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Category with this ID not found"
            ], 404);
        }
    }


}

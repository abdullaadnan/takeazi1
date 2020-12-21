<?php

namespace App\Http\Controllers;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductSubcategoryController extends Controller
{
    public function index()
    {
        $prosub = DB::table('product_subcategories')->get();
        return (['product_subcategories' => $prosub]);
    }

    public function create(Request $request)
    {
        $validator = validator::make($request->all(), [
            'product_id' => 'required|integer',
            'product_category_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $prosub = DB::table('product_subcategories')->insertGetId([
            'product_id' => $request->input('product_id'),
            'product_category_id' => $request->input('product_category_id'),
        ]);
        return response()->json([
            "message" => "product_subcategory added succesfully",
            "id" => $prosub
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'product_id' => 'required|integer',
            'product_category_id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if (DB::table('product_subcategories')->where('id', $id)->exists()) {
            $prosub = DB::table('product_subcategories')->where('id', $id)->update([
                'product_id' => $request->input('product_id'),
                'product_category_id' => $request->input('product_category_id'),
                'updated_at' => Carbon::now()
            ]);
            return response()->json([
                "message" => "product_subcategories updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "product_subcategories updation failed"
            ], 404);
        }
    }

    public function SelectById($id)
    {
        if (DB::table('product_subcategories')->where('id', $id)->exists()) {
            $prosub = DB::table('product_subcategories')->where('id', $id)->get();
            return (['product_subcategories' => $prosub]);
        } else {
            return response()->json([
                "message" => "Product_subcategory with this ID not found"
            ], 404);
        }
    }
}


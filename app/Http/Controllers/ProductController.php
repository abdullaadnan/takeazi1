<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')->get();
        return (['products' => $product]);
    }

    public function create(Request $request)
    {
        $validator=validator::make($request->all(),[
            'shop_id'=>'required|integer',
            'product_name'=>'required',
            'mrp'=>'required|integer',
            'selling_price'=>'required|integer',
            'cost_price'=>'required|integer',
            'status'=>'required|Boolean',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $product = DB::table('products')->insertGetId([
            'shop_id' =>$request->input('shop_id'),
            'product_name' => $request->input('product_name'),
            'product_category_id' => $request->input('product_category_id'),
            'details' => $request->input('details'),
            'mrp' => $request->input('mrp'),
            'selling_price' => $request->input('selling_price'),
            'cost_price' => $request->input('cost_price'),
            'waiting_time' => $request->input('waiting_time'),
            'thumbnail' => $request->input('thumbnail'),
            'status' => $request->input('status'),
        ]);
        return response()->json([
            "message" => "product added succesfully",
            "id"=>$product
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator=validator::make($request->all(),[
            'shop_id'=>'required|integer',
            'product_name'=>'required',
            'mrp'=>'required|integer',
            'selling_price'=>'required|integer',
            'cost_price'=>'required|integer',
            'status'=>'required|Boolean',

        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        if (DB::table('products')->where('id', $id)->exists()) {
            $products = DB::table('products')->where('id', $id)->update([
                'shop_id' =>$request->input('shop_id'),
                'product_name' => $request->input('product_name'),
                'product_category_id' => $request->input('product_category_id'),
                'details' => $request->input('details'),
                'mrp' => $request->input('mrp'),
                'selling_price' => $request->input('selling_price'),
                'cost_price' => $request->input('cost_price'),
                'waiting_time' => $request->input('waiting_time'),
                'thumbnail' => $request->input('thumbnail'),
                'status' => $request->input('status'),
                'updated_at'=> Carbon::now()
            ]);
            return response()->json([
                "message" => "product updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Product updation failed"
            ], 404);
        }
    }

    public function SelectById($id)
    {
        if (DB::table('products')->where('id', $id)->exists()) {
            $products = DB::table('products')->where('id', $id)->get();
            return (['products' => $products]);
        } else {
            return response()->json([
                "message" => "Product with this ID not found"
            ], 404);
        }
    }

    public function delete($id)
    {
        if (DB::table('products')->where('id', $id)->exists()) {
            $products = DB::table('products')->where('id', $id)->delete();
            return response()->json([
                "message" => " product records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Product with this ID not found"
            ], 404);
        }
    }
}

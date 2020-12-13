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
            'product_name'=>'required',
            'category_name'=>'required',
            'prdct_img'=>'required',
            'price'=>'required',
            'in_stock'=>'required',
            'veg_non'=>'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $product = DB::table('products')->insert([
            'product_name' => $request->input('product_name'),
            'category_name' => $request->input('category_name'),
            'prdct_img' => $request->input('prdct_img'),
            'description' => $request->input('description'),
            'contents' => $request->input('contents'),
            'production_method' => $request->input('production_method'),
            'ingredients' => $request->input('ingredients'),
            'price' => $request->input('price'),
            'in_stock' => $request->input('in_stock'),
            'is_offer' => $request->input('is_offer'),
            'grb_rs' => $request->input('grb_rs'),
            'spcl_ofr' => $request->input('spcl_ofr'),
            'from_date' => $request->input('from_date'),
            'till_date' => $request->input('till_date'),
            'veg_non' => $request->input('veg_non'),
        ]);
        return response()->json([
            "message" => "product added succesfully",
        ], 201);
    }

    public function update(Request $request, $product_id)
    {
        $validator=validator::make($request->all(),[
            'product_name'=>'required',
            'category_name'=>'required',
            'prdct_img'=>'required',
            'price'=>'required',
            'in_stock'=>'required',
            'veg_non'=>'required',

        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        if (DB::table('products')->where('product_id', $product_id)->exists()) {
            $products = DB::table('products')->where('product_id', $product_id)->update([
                'product_name' => $request->input('product_name'),
                'category_name' => $request->input('category_name'),
                'prdct_img' => $request->input('prdct_img'),
                'description' => $request->input('description'),
                'contents' => $request->input('contents'),
                'production_method' => $request->input('production_method'),
                'ingredients' => $request->input('ingredients'),
                'price' => $request->input('price'),
                'in_stock' => $request->input('in_stock'),
                'is_offer' => $request->input('is_offer'),
                'grb_rs' => $request->input('grb_rs'),
                'spcl_ofr' => $request->input('spcl_ofr'),
                'from_date' => $request->input('from_date'),
                'till_date' => $request->input('till_date'),
                'veg_non' => $request->input('veg_non'),
                'updated_at'=> Carbon::now()
            ]);
            return response()->json([
                "message" => "product updated successfully",
                "product_id"=>"$product_id"
            ], 200);
        } else {
            return response()->json([
                "message" => "Product updated failed"
            ], 404);
        }
    }

    public function SelectById($product_id)
    {
        if (DB::table('products')->where('product_id', $product_id)->exists()) {
            $products = DB::table('products')->where('product_id', $product_id)->get();
            return (['products' => $products]);
        } else {
            return response()->json([
                "message" => "Product with this ID not found"
            ], 404);
        }
    }

    public function delete($product_id)
    {
        if (DB::table('products')->where('product_id', $product_id)->exists()) {
            $products = DB::table('products')->where('product_id', $product_id)->delete();
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

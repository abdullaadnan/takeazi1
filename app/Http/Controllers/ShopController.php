<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ShopController extends Controller
{
    public function create(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'shop_type' => 'required',
            'mobile1' => 'required',
            'mobile2' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'address_1' => 'required',
            'pincode_id' => 'required|integer',
            'licence_code' => 'required',
            'shop_thumbnail' => 'required',
            'shop_banner1' => 'required',
            'is_display'=>'required|Boolean',
            'status'=>'required|Boolean',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
            $shop = DB::table('shops')->insertGetId([
                'shop_code' => $request->input('shop_code'),
                'short_name' => $request->input('short_name'),
                'name' => $request->input('name'),
                'shop_type' => $request->input('shop_type'),
                'mobile1' => $request->input('mobile1'),
                'mobile2' => $request->input('mobile2'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'quote' => $request->input('quote'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'pincode_id' => $request->input('pincode_id'),
                'licence_code' => $request->input('licence_code'),
                'shop_thumbnail' => $request->input('shop_thumbnail'),
                'shop_banner1' => $request->input('shop_banner1'),
                'shop_banner2' => $request->input('shop_banner2'),
                'is_display' => $request->input('is_display'),
                'status' => $request->input('status'),
            ]);

            return response()->json([
                'message' => 'shop added successfully',
                'id' => $shop
            ], 201);

    }
    public function update(Request $request, $id)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'shop_type' => 'required',
            'mobile1' => 'required',
            'mobile2' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'address_1' => 'required',
            'pincode_id' => 'required|integer',
            'licence_code' => 'required',
            'shop_thumbnail' => 'required',
            'shop_banner1' => 'required',
            'is_display'=>'required|Boolean',
            'status'=>'required|Boolean',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if (DB::table('shops')->where('id', $id)->exists()) {
            $shop = DB::table('shops')->where('id', $id)->update([
                'shop_code' => $request->input('shop_code'),
                'short_name' => $request->input('short_name'),
                'name' => $request->input('name'),
                'shop_type' => $request->input('shop_type'),
                'mobile1' => $request->input('mobile1'),
                'mobile2' => $request->input('mobile2'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'quote' => $request->input('quote'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'pincode_id' => $request->input('pincode_id'),
                'licence_code' => $request->input('licence_code'),
                'shop_thumbnail' => $request->input('shop_thumbnail'),
                'shop_banner1' => $request->input('shop_banner1'),
                'shop_banner2' => $request->input('shop_banner2'),
                'is_display' => $request->input('is_display'),
                'status' => $request->input('status'),
                'updated_at'=> Carbon::now()

            ]);
            return response()->json([
                "message" => "shop updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Shop updation failed"
            ], 404);
        }

        }
    public function index()
    {
        $shop = DB::table('shops')->get();
        return (['shops' => $shop]);
    }
    public function SelectById($id)
    {
        if (DB::table('shops')->where('id', $id)->exists()) {
            $shop = DB::table('shops')->where('id', $id)->get();
            return (['shops' => $shop]);
        } else {
            return response()->json([
                "message" => "Shop with this ID not found"
            ], 404);
        }
    }
    }





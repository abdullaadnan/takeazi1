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
            'shop_name' => 'required',
            'shop_type' => 'required',
            'contact_number' => 'required|integer',
            'shop_address' => 'required',
            'shop_pin' => 'required|integer',
            'shop_location' => 'required',
            'shop_license' => 'required',
            'is_pur_veg' => 'required|Boolean',
            'shop_work_time' => 'required|Json',
            'shop_banner_img' => 'required',
            'shop_banner_img1' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
            $shop = DB::table('shops')->insertGetId([
                'shop_name' => $request->input('shop_name'),
                'short_name' => $request->input('short_name'),
                'shop_type' => $request->input('shop_type'),
                'contact_number' => $request->input('contact_number'),
                'shop_address' => $request->input('shop_address'),
                'shop_pin' => $request->input('shop_pin'),
                'shop_land_mark' => $request->input('shop_land_mark'),
                'shop_location' => $request->input('shop_location'),
                'shop_license' => $request->input('shop_license'),
                'is_pur_veg' => $request->input('is_pur_veg'),
                'shop_work_time' => $request->input('shop_work_time'),
                'shop_banner_img' => $request->input('shop_banner_img'),
                'shop_banner_img1' => $request->input('shop_banner_img1'),
            ]);

            return response()->json([
                'message' => 'shop added successfully',
                'shop_id' => $shop
            ], 201);

    }
    public function update(Request $request, $shop_id)
    {
        $validator = validator::make($request->all(), [
            'shop_name' => 'required',
            'shop_type' => 'required',
            'contact_number' => 'required|integer',
            'shop_address' => 'required',
            'shop_pin' => 'required|integer',
            'shop_location' => 'required',
            'shop_license' => 'required',
            'is_pur_veg' => 'required|Boolean',
            'shop_work_time' => 'required|Json',
            'shop_banner_img' => 'required',
            'shop_banner_img1' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        if (DB::table('shops')->where('shop_id', $shop_id)->exists()) {
            $shop = DB::table('shops')->where('shop_id', $shop_id)->update([
                'shop_name' => $request->input('shop_name'),
                'short_name' => $request->input('short_name'),
                'shop_type' => $request->input('shop_type'),
                'contact_number' => $request->input('contact_number'),
                'shop_address' => $request->input('shop_address'),
                'shop_pin' => $request->input('shop_pin'),
                'shop_land_mark' => $request->input('shop_land_mark'),
                'shop_location' => $request->input('shop_location'),
                'shop_license' => $request->input('shop_license'),
                'is_pur_veg' => $request->input('is_pur_veg'),
                'shop_work_time' => $request->input('shop_work_time'),
                'shop_banner_img' => $request->input('shop_banner_img'),
                'shop_banner_img1' => $request->input('shop_banner_img1'),
                'updated_at'=> Carbon::now()

            ]);
            return response()->json([
                "message" => "shop updated successfully",
                "shop_id"=>"$shop_id"
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
    public function SelectById($shop_id)
    {
        if (DB::table('shops')->where('shop_id', $shop_id)->exists()) {
            $shop = DB::table('shops')->where('shop_id', $shop_id)->get();
            return (['shops' => $shop]);
        } else {
            return response()->json([
                "message" => "Shop with this ID not found"
            ], 404);
        }
    }
    }





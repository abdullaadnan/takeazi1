<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class StaffController extends Controller
{
    public function index()
    {
        $staff = DB::table('staffs')->get();
        return (['staffs' => $staff]);
    }

    public function create(Request $request)
    {
        $validator = validator::make($request->all(), [
            'rstrnt_type' => 'required|Boolean',
            'staff_name' => 'required',
            'address' => 'required',
            'pin' => 'required',
            'commission' => 'required|integer',
            'email' => 'required|E-mail',
            'designation' => 'required',
            'city' => 'required',
            'state' => 'required',
            'phone_number' => 'required|integer',

        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $staff=DB::table('staffs')->insertGetId([
            'rstrnt_type' => $request->input('rstrnt_type'),
            'staff_name' => $request->input('staff_name'),
            'address' => $request->input('address'),
            'pin' => $request->input('pin'),
            'landmark' => $request->input('landmark'),
            'commission' => $request->input('commission'),
            'email' => $request->input('email'),
            'designation' => $request->input('designation'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'phone_number' => $request->input('phone_number'),
            'staff_img' => $request->input('staff_img'),
        ]);
        return response()->json([
            "message" => "staff added succesfully",
            "staff_id"=>$staff,
            "shshhs"=>$hshshsh
        ], 201);

    }
    public function update(Request $request,$staff_id){
        if (DB::table('staffs')->where('staff_id', $staff_id)->exists()) {
            $validator = validator::make($request->all(), [
                'rstrnt_type' => 'required|Boolean',
                'staff_name' => 'required',
                'address' => 'required',
                'pin' => 'required',
                'commission' => 'required|integer',
                'email' => 'required|E-mail',
                'designation' => 'required',
                'city' => 'required',
                'state' => 'required',
                'phone_number' => 'required|integer',

            ]);
            if ($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            $staff=DB::table('staffs')->where('staff_id', $staff_id)->update([
                'rstrnt_type' => $request->input('rstrnt_type'),
                'staff_name' => $request->input('staff_name'),
                'address' => $request->input('address'),
                'pin' => $request->input('pin'),
                'landmark' => $request->input('landmark'),
                'commission' => $request->input('commission'),
                'email' => $request->input('email'),
                'designation' => $request->input('designation'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'phone_number' => $request->input('phone_number'),
                'staff_img' => $request->input('staff_img'),
                'updated_at'=>Carbon::now()
            ]);
            return response()->json([
                "message" => "staff updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Staff updation failed"
            ], 404);
        }
    }

    public function SelectById($staff_id)
    {
        if (DB::table('staffs')->where('staff_id', $staff_id)->exists()) {
            $staff = DB::table('staffs')->where('staff_id', $staff_id)->get();
            return (['staffs' => $staff]);
        } else {
            return response()->json([
                "message" => "Staff with this ID not found"
            ], 404);
        }
        }

    }

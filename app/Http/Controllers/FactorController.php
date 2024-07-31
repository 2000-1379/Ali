<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexFactors(Request $request)
    {
        $factor=Factor::all();
        return response()->json($factor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getFactorWithItems($id)
    {
        // پیدا کردن فاکتور با آیتم‌های مرتبط
        $factor = Factor::with('factorItems')->find($id);

        // بررسی اگر فاکتور موجود نباشد
        if (!$factor) {
            return response()->json(['message' => 'Factor not found'], 404);
        }

        // بازگشت اطلاعات فاکتور به همراه آیتم‌های آن
        return response()->json($factor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFactors(Request $request)
    {
        $user_id=$request->get('user_id');
        $customer_id=$request->get('customer_id');
        $fullname=$request->get('fullname');
        $national_code=$request->get('national_code');
        $type=$request->get('type');
        $mobile=$request->get('mobile');
        $phone=$request->get('phone');
        $state=$request->get('state');
        $city=$request->get('city');
        $address=$request->get('address');
        $zipcode=$request->get('zipcode');
        $description=$request->get('description');
        $status=$request->get('status');


        $factor=Factor::create([
            'user_id'=>$user_id,
            'customer_id'=>$customer_id,
            'fullname'=>$fullname,
            'national_code'=>$national_code,
            'type'=>$type,
            'mobile'=>$mobile,
            'phone'=>$phone,
            'state'=>$state,
            'city'=>$city,
            'address'=>$address,
            'zipcode'=>$zipcode,
            'description'=>$description,
            'status'=>$status
        ]);
        return response()->json($factor);

    }

    /**
     * Display the specified resource.
     */
    public function showFactorwithItem(Request $request,Factor $factor,$id)
    {
        $factor = Factor::with('factorItems')->find($id);

        if (!$factor) {
            return response()->json(['message' => 'Factor not found'], 404);
        }

        return response()->json($factor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factor $factor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFactors(Request $request, Factor $factor,$id)
    {
        $factor = Factor::find($id);

        if (!$factor) {
            return response()->json(['message' => 'Factor id not found'], 404);
        }

        // به‌روزرسانی فیلدهای Factor
        $factor->update([
            'user_id' => $request->get('user_id'),
            'customer_id' => $request->get('customer_id'),
            'fullname' => $request->get('fullname'),
            'national_code' => $request->get('national_code'),
            'type' => $request->get('type'),
            'mobile' => $request->get('mobile'),
            'phone' => $request->get('phone'),
            'state' => $request->get('state'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'zipcode' => $request->get('zipcode'),
            'description' => $request->get('description'),
            'status' => $request->get('status'),
        ]);

        return response()->json($factor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyFactors(Factor $factor,$id)
    {
        $factor=Factor::find($id);

        if (!$factor){
            return response()->json(['message' => 'Factor id not found'], 404);
        }
        $factor->delete();
       // $factor->factorItems()->delete();
        return response()->json(['message'=>'delete is successful']);
    }


}

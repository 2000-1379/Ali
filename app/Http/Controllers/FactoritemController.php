<?php

namespace App\Http\Controllers;

use App\Models\factoritem;
use Illuminate\Http\Request;

class FactoritemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexFactorItem()
    {
        $factor_item=factoritem::all();
        return response()->json($factor_item);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function getFactorItemWithFactor($id)
    {
        $factorItem = FactorItem::with('factor')->find($id);

        // بررسی اگر آیتم فاکتور موجود نباشد
        if (!$factorItem) {
            return response()->json(['message' => 'FactorItem not found'], 404);
        }

        // بازگشت اطلاعات آیتم فاکتور به همراه فاکتور آن
        return response()->json($factorItem);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeFactorItem(Request $request)
    {
        $factorId = $request->get('factor_id'); // دریافت factor_id از درخواست
        if (!$factorId) {
            return response()->json(['error' => 'factor_id is required'], 400);
        }

        // دریافت سایر مقادیر از درخواست
        $image = $request->get('image');
        $title = $request->get('title');
        $price = $request->get('price');
        $total = $request->get('total');
        $discount = $request->get('discount');
        $status = $request->get('status');

        // ساخت آیتم جدید و ذخیره در پایگاه داده
        $factorItem = FactorItem::create([
            'factor_id' => $factorId,
            'image' => $image,
            'title' => $title,
            'price' => $price,
            'total' => $total,
            'discount' => $discount,
            'status' => $status,
        ]);

        return response()->json($factorItem);
    }

    /**
     * Display the specified resource.
     */
    public function show(factoritem $factoritem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(factoritem $factoritem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateFactorItem(Request $request, factoritem $factoritem,$id)
    {
        // پیدا کردن نمونه factoritem با استفاده از id
        $factor_item = factoritem::find($id);

        if (!$factor_item) {
            return response()->json(['message' => 'Factor Item not found'], 404);
        }

        // به‌روزرسانی فیلدهای factoritem
        $factor_item->update([
            'factor_id'=>$request->get('factor_id'),
            'image' => $request->get('image'),
            'title' => $request->get('title'),
            'price' => $request->get('price'),
            'total' => $request->get('total'),
            'discount' => $request->get('discount'),
            'status' => $request->get('status'),
        ]);

        return response()->json($factor_item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyFactorItem(factoritem $factoritem,$id)
    {
        $factor_item=factoritem::find($id);

        if(!$factor_item){
            return response()->json(['message'=>'id not found']);
        }
        $factor_item->delete();
        return response()->json(['messge'=>'delete is successful']);
    }
}

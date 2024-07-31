<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexCustomer()
    {
        $customer=Customer::all();
        return response()->json($customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getCustomerWithFactors($customerId)
    {
         // پیدا کردن مشتری به همراه فاکتورهای مرتبط
        $customer = Customer::with('factors')->find($customerId);

        // بررسی اگر مشتری موجود نباشد
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // بازگشت اطلاعات مشتری به همراه فاکتورها
        return response()->json($customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCustomer(Request $request)
    {
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

        $customer=Customer::create([
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
        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     */
    public function showIndex()
    {
        // فرض کنیم که شما می‌خواهید همه مشتری‌ها را دریافت کنید
        $customers = Customer::all();

        // ارسال داده‌ها به ویو
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getCustomerWithFactorsAndItems($customerId)
    {
        $customer = Customer::with('factors.factorItems')->find($customerId);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateCustomer(Request $request, Customer $customer,$id)
    {
        // پیدا کردن رکورد مشتری بر اساس شناسه
        $customer = Customer::find($id);

        // بررسی وجود رکورد
        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // دریافت داده‌ها از درخواست
        $fullname = $request->get('fullname');
        $national_code = $request->get('national_code');
        $type = $request->get('type');
        $mobile = $request->get('mobile');
        $phone = $request->get('phone');
        $state = $request->get('state');
        $city = $request->get('city');
        $address = $request->get('address');
        $zipcode = $request->get('zipcode');
        $description = $request->get('description');
        $status = $request->get('status');

        // به‌روزرسانی ویژگی‌های مدل
        $customer->update([
            'fullname' => $fullname,
            'national_code' => $national_code,
            'type' => $type,
            'mobile' => $mobile,
            'phone' => $phone,
            'state' => $state,
            'city' => $city,
            'address' => $address,
            'zipcode' => $zipcode,
            'description' => $description,
            'status' => $status
        ]);

        // بازگرداندن پاسخ JSON با داده‌های به‌روز شده
        return response()->json($customer);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyCustomer(Customer $customer,$id)
    {
        $customer=Customer::find($id);
        $customer->delete();
        return response()->json($customer);
    }
}

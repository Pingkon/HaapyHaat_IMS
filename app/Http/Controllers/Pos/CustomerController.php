<?php

namespace App\Http\Controllers\Pos;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;



class CustomerController extends Controller
{
    public function CustomerAll(){

        $customers = Customer::latest()->get();

        return view('backend.customer.customer_all', compact('customers'));

    }

    public function CustomerAdd(){

        return view('backend.customer.customer_add');

    }

    public function CustomerStore(Request $request){
        
        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);

    }

    public function CustomerEdit($id){

        $customer = Customer::findOrFail($id);
        return view('backend.customer.customer_edit', compact('customer'));

    }

    public function CustomerUpdate(Request $request){

        $customer_id = $request->id;
            Customer::findOrFail($customer_id)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->id,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Customer Updated Successfully', 
                'alert-type' => 'success'
            );

            return redirect()->route('customer.all')->with($notification);

    }

    public function CustomerDelete($id){  

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}

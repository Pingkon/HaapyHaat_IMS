<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farmer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FarmerController extends Controller
{
    public function FarmerAll(){
        // $farmer = Farmer::all();
        $farmers = Farmer::latest()->get();

        return view('backend.farmer.farmer_all', compact('farmers'));

    } // End Method

    public function FarmerAdd(){

        return view('backend.farmer.farmer_add');
        
    } // End Method

    public function FarmerStore(Request $request){

        Farmer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Farmer Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('farmer.all')->with($notification);
        
    } // End Method

    public function FarmerEdit($id){

        $farmer = Farmer::findorFail($id);
        return view('backend.farmer.farmer_edit', compact('farmer'));

    }// End Method
}

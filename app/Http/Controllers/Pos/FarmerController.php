<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farmer;

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
}

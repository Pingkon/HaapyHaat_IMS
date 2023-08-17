<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Farmer;
use App\Models\Customer;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalFarmers= Farmer::count();
        $totalCustomers= Customer::count();
        $totalProducts= Product::count();
        return view('admin.index', compact('totalCustomers','totalFarmers','totalProducts'));
    }
}

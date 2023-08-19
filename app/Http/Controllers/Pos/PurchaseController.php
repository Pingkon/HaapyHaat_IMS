<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Category;
use App\Models\Product;
use App\Models\Farmer;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function PurchaseAll(){

        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.purchase_all', compact('allData'));

    }

    public function PurchaseAdd(){

        $farmer = Farmer::all();
        $unit = Unit::all();
        $category = Category::all();

        return view('backend.purchase.purchase_add', compact('farmer','unit','category'));
    }
}

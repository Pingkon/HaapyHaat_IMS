<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Category;
use App\Models\Product;
use App\Models\Farmer;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function GetCategory(Request $request){

        $farmer_id = $request->farmer_id;
        // dd($supplier_id);
        $allCategory = Product::with(['category'])->select('category_id')->where('farmer_id',$farmer_id)->groupBy('category_id')->get();
        return response()->json($allCategory);

    }

    public function GetProduct(Request $request){

        $category_id = $request->category_id; 
        $allProduct = Product::where('category_id',$category_id)->get();
        return response()->json($allProduct);
    }
}

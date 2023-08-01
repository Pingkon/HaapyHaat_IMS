<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Farmer;
use App\Models\Unit;


class ProductController extends Controller
{
    public function ProductAll(){

        $products = Product::latest()->get();

        return view('backend.product.product_all', compact('products'));

    }
}

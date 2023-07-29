<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryAll(){

        $categories = Category::latest()->get();

        return view('backend.category.category_all', compact('categories'));

    }

    public function CategoryAdd(){

        return view('backend.category.category_add');

    }
}

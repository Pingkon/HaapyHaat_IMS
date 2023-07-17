<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function CustomerAll(){

        $customers = Customer::latest()->get();

        return view('backend.customer.customer_all', compact('customers'));

    }
}

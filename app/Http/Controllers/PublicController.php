<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class PublicController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('public.components.index', compact(['customers']));
    }
}

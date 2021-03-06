<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Service;

class CustomerController extends Controller
{
    protected $customers;

    public function __Construct() {
        $this->customers = Customer::latest()->get();
    }
    public function AddCustomer(Request $request) {
        if ($request->isMethod('GET')) {
            return view('public.components.form.AddCustomer');
        } elseif ($request->isMethod('POST')) {
            $request->validate([
                'customer_name' => 'required|min:3',
                'company_name' => 'required|min:4',
            ]);
            $customer = new Customer();
            $customer->name = $request->customer_name;
            $customer->company_name = $request->company_name;
            $customer->save();

            $customer->hash = sha1($customer->id);
            $customer->save();
            
            $message = [
                'content' => 'Customer added.',
                'type' => 'info'
            ];
            return view('public.components.form.AddCustomer', compact('message'));
        } else {
            return abort(403, 'Access forbiden.');
        }
    }

    public function ListCustomers(Request $request) {
        $customers = $this->customers;
        return view('public.components.table.ListCustomers', compact('customers'));
    }

    public function ShowCustomer($hash) {
        $customer = Customer::where('hash', $hash)->first();
        return view('public.components.profile.CustomerProfile', compact('customer'));
    }
}
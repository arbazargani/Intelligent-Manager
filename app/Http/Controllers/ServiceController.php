<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Service;

class ServiceController extends Controller
{
    public function AddService(Request $request) {
        $customers = Customer::all();
        if ($request->isMethod('GET')) {
            return view('public.components.form.AddService', compact(['customers']));
        } elseif ($request->isMethod('POST')) {
            $service = new Service();
            $service->name = $request->service_name;
            $service->type = 'service';
            $service->info = $request->options;
            $service->customer_id = $request->customer_id;
            $service->save();

            $service->hash = sha1($service->id);
            $service->save();
            
            $message = [
                'content' => 'Service added.',
                'type' => 'info'
            ];
            return view('public.components.form.AddService', compact(['customers', 'message']));
        } else {
            return abort(403, 'Access forbiden.');
        }
    }

    public function ListServices(Request $request) {
        return Service::latest()->get();
    }
}
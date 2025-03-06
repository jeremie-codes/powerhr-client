<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
            try {
                

                if (Auth::user()->customer) {
                    $customer = Client::find(Auth::user()->customer->id);
                    $customer->update([
                        'name' => $request->name,
                        'adress' => $request->address,
                        'activity' => $request->activity,
                        'phone' => $request->phone,
                        'logo' => $request->logo,
                        'contact_name' => $request->contact_name,
                        'contact_phone' => $request->contact_phone,
                        'contact_email' => $request->contact_email,
                        'website' => $request->website,
                        'description' => $request->description,
                        'city' => $request->city,
                        'country' => $request->country,
                    ]);

                    return redirect()->route('customer.create');
                } else {
                    $customer = Client::create([
                        'name' => $request->name,
                        'adress' => $request->address,
                        'activity' => $request->activity,
                        'phone' => $request->phone,
                        'logo' => $request->logo,
                        'contact_name' => $request->contact_name,
                        'contact_phone' => $request->contact_phone,
                        'contact_email' => $request->contact_email,
                        'website' => $request->website,
                        'description' => $request->description,
                        'city' => $request->city,
                        'country' => $request->country,
                        'user_id' => Auth::user()->id,
                    ]);
                }
                return redirect()->route('customer.create');
            }catch (Exception $e) {
                return $e->getMessage();
            }
        
        
        return redirect()->route('customer.create');
    }
}

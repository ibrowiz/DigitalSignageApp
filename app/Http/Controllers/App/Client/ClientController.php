<?php

namespace App\Http\Controllers\App\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientProfile;
use App\Models\Tenant;
use App\Models\User;
use App\Models\ContentOwnerWallet;

class ClientController extends Controller
{
    
    public function store(Request $request)
    {
        $tenant = Tenant::where('domain','telvida') -> first();
         $clientProfile = ClientProfile::create([
            'name' => $request->input('name'),
            'contact_email' => $request->input('contact'),
            'address' => $request->input('address'),
        ]);

        // Now you have a clientprofile object so we can use that for the contact model

        $user = User::create([
            'client_id' => $clientProfile->id, // Notice the clientprofile ID here
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tenant_id' => $tenant->id,
            'password' =>bcrypt($request->input('password')),
        ]);


        $wallet = ContentOwnerWallet::create([
            'content_owner_id' => $clientProfile->id, 
            'amount' => 0,
            'last_transaction' =>0,
        ]);

        return redirect('/');   
         }

}

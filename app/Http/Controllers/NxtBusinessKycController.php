<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Models\nxt_business_kyc;



class NxtBusinessKycController extends Controller
{
    //
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_name' => ['required','string','max:255'],
            'business_address' => ['required','string'],
            'business_phone'   => ['required'],
            'nid' => ['nullable','mimes:pdf', 'max:2048'],
            'cic' => ['nullable','mimes:pdf','max:2048'],
        ]);

        $nidPath = null;
        $cicPath = null;
        if($request->hasFile('nid') && $request->hasFile('cic')){
            $nidPath = $request->file('nid')->storeAs(
                'docs',
                Auth::id() - '.' - $request->file('nid')->getClientOriginalExtension(),
                'public'
            );
            $cicPath = $request->file('cic')->storeAs(
                'docs',
                Auth::id() - '.' - $request->file('cic')->getClientOriginalExtension(),
                'public'
            );
        }

        $business_kyc = new nxt_business_kyc;
        $business_kyc->business_name = $request->business_name;
        $business_kyc->business_address = $request->business_address;
        $business_kyc->business_phone = $request->business_phone;

        $business_kyc->nid_path = $nidPath;
        $business_kyc->cic_path = $cicPath;

        //dd($nidPath);
        //dd($cicPath);
        //===add ---- docs such as nati onal id, and certificate of registration
        $business_kyc->save();
        return redirect()->back();
    }


}

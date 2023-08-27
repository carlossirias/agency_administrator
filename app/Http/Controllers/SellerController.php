<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    //

    public function sellers()
    {
        Auth::loginUsingId(1);
        $sellersActive = 0;

        $sellers = Seller::where('agency_id', Auth::user()->id)->orderByDesc('enabled')->get();

        foreach ($sellers as $seller){
            if($seller->enabled) $sellersActive++;
        }

        return view('sellers', compact('sellers','sellersActive'));
    }

    public function sellersCreate(Request $request)
    {

        $data = '';
        
        if($request->has('seller_image'))
        {
            $data = $request->file('seller_image')->store('uploads','public');
        }

        $seller = new Seller();
        $seller->agency_id = Auth::user()->id;
        $seller->seller_name = $request['seller_name'];
        $seller->seller_adress = $request['seller_adress'];
        $seller->seller_phone = $request['seller_phone'];
        $seller->enabled = true;
        $seller->seller_identification_number = $request['seller_identification_number'];
        $seller->seller_image = $data;
        $seller->saveOrFail();
        
        return back();
    }

    public function sellersUpdate(Request $request)
    {
        
        $id = Crypt::decryptString($request->id);
        
        $request->id;
        Seller::where('id',$id)->update(
            ['seller_name' => $request->name,
            'seller_adress' => $request->adress,
            'seller_phone'=> $request->number,
            'seller_identification_number' => $request->identification_number,
            'enabled' => $request->has('enabled')]
            );
        return back();
    }

    public function sellersDelete(Request $request)
    {
        $id = Crypt::decryptString($request->id);

        $seller = Seller::findOrFail($id);

        Storage::delete('public/'.$seller->seller_image);
        
        Seller::destroy([$id]);
        
        return back();
    }
    
}

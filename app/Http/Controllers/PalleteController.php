<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\PricePallete;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;

class PalleteController extends Controller
{
    //
    public function palletes()
    {
        Auth::loginUsingId(1);

        $palletes = DB::table('prices_palletes')
        ->join('palletes', 'palletes.id', '=', 'prices_palletes.pallete_id')
        ->select('prices_palletes.id','pallete_name', 'pallete_image', 'pallete_description', 'promotion', 'promotion_price','suggested_price', 'promotion_price', 'added_price')
        ->where('agency_id','=',Auth::user()->id)
        ->orderByDesc('promotion')
        ->get();

        return view('palletes', compact('palletes'));
    }

    public function pricesPalletesUpdate(Request $request)
    {
        $id = Crypt::decryptString($request->input('id'));
        $value = !empty($request->input('price'))? $request->input('price'): 0;

        PricePallete::where('id',$id)->update([
            'added_price' => $value
        ]);
        return json_encode($value);
    }
}

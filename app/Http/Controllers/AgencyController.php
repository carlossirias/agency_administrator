<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DailyRecord;
use App\Models\DailyPalleteSale;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PricePallete;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AgencyController extends Controller
{
    //

    public function index()
    {
        Auth::loginUsingId(1);
        $actualDate = Carbon::now()->format('Y-m-d');
        $id = Auth::id();

        $activeSellers = DB::select("SELECT daily_records.id, seller_id, active, seller_name, seller_adress,seller_image, seller_phone, DATE_FORMAT(daily_records.departure_datetime, '%h:%i %p') AS departure_datetime, DATE_FORMAT(daily_records.arrival_datetime, '%h:%i %p') AS arrival_datetime FROM daily_records INNER JOIN sellers ON daily_records.seller_id = sellers.id WHERE DATE_FORMAT(daily_records.departure_datetime, '%Y-%m-%d') = ? AND sellers.agency_id = ? AND sellers.enabled = true ORDER BY daily_records.active DESC, daily_records.departure_datetime DESC;", [$actualDate,Auth::user()->id]);
        return view('dashboard', compact('id', 'activeSellers'));
    }

    public function sendSeller()
    {
        //It must be validated if the user is registered, but for the demo, the first agency will always be used.
        Auth::loginUsingId(1);
        
        $palletes = DB::table('prices_palletes')
        ->join('palletes', 'palletes.id', '=', 'prices_palletes.pallete_id')
        ->select('prices_palletes.id','pallete_name', 'pallete_image', 'pallete_description', 'promotion', 'promotion_price','suggested_price', 'promotion_price', 'added_price')
        ->where('agency_id','=',Auth::user()->id)
        ->orderByDesc('promotion')
        ->get();

        $sellers = DB::select("SELECT id, seller_name FROM sellers WHERE id NOT IN (SELECT seller_id FROM daily_records WHERE DATE_FORMAT(departure_datetime, '%Y-%m-%d') = CURRENT_DATE) AND enabled = true AND agency_id = ?;", [Auth::user()->id]);
        return view('send', compact('sellers', 'palletes'));
    }

    public function dispatchSeller(Request $request)
    {
        $now = Carbon::now();
        $id = Crypt::decryptString($request->input('seller_id'));

        $dailyRecord = new DailyRecord();
        $dailyRecord->seller_id = $id;
        $dailyRecord->departure_datetime = $now;
        $dailyRecord->saveOrFail();

        $paletteSales = $request->input('palletes_sale');

        foreach ($paletteSales as $palleteId => $quantitySend) {
            $dailyPaletteSale = new DailyPalleteSale();
            $dailyPaletteSale->daily_record_id = $dailyRecord->id; 
            $dailyPaletteSale->pallete_id = $palleteId;
            $dailyPaletteSale->quantity_send = $quantitySend;
            $palletePrices = DB::table('prices_palletes')
            ->join('palletes', 'palletes.id', '=', 'prices_palletes.pallete_id')
            ->select('promotion','suggested_price', 'promotion_price', 'added_price')
            ->where('agency_id','=',Auth::user()->id)
            ->where('palletes.id','=',$palleteId)
            ->first();

            if($palletePrices->promotion)
            {
                $dailyPaletteSale->price = ($palletePrices->promotion_price + $palletePrices->added_price);
            }
            else
            {
                $dailyPaletteSale->price = ($palletePrices->suggested_price + $palletePrices->added_price);
            }
            $dailyPaletteSale->save();
        }

        
        return redirect(route('agency.index'));
        
    }


    public function viewDispatch($id)
    {
        $idDecrypt = Crypt::decryptString($id);

        $seller =  DB::select("SELECT daily_records.id, seller_id, seller_identification_number, active, seller_name, seller_adress,seller_image, seller_phone, DATE_FORMAT(daily_records.departure_datetime, '%d/%m/%Y %h:%i %p') AS departure_datetime, DATE_FORMAT(daily_records.arrival_datetime, '%d/%m/%Y %h:%i %p') AS arrival_datetime FROM daily_records INNER JOIN sellers ON daily_records.seller_id = sellers.id WHERE daily_records.id = ?;", [$idDecrypt]);

        $palletes = DB::select('SELECT * from daily_pallete_sales INNER JOIN palletes ON palletes.id = daily_pallete_sales.pallete_id WHERE daily_record_id = ? ', [$idDecrypt]);
        $palleteCount = 0;
        $totalPricePalletes = 0.0;

        foreach($palletes as $pallete)
        {
            $palleteCount += $pallete->quantity_send;
            $totalPricePalletes += $pallete->price * $pallete->quantity_send;
        }
        return view('show_send', compact('seller', 'totalPricePalletes', 'palleteCount', 'palletes'));
    }

    public function receiveSeller($id)
    {
        $idDecrypt = Crypt::decryptString($id);

        $seller =  DB::select("SELECT daily_records.id, seller_id, seller_identification_number, active, seller_name, seller_adress,seller_image, seller_phone, DATE_FORMAT(daily_records.departure_datetime, '%d/%m/%Y %h:%i %p') AS departure_datetime, DATE_FORMAT(daily_records.arrival_datetime, '%h:%i %p') AS arrival_datetime FROM daily_records INNER JOIN sellers ON daily_records.seller_id = sellers.id WHERE daily_records.id = ?;", [$idDecrypt]);

        if(!$seller[0]->active) return redirect(route('agency.index'));

        $palletes = DB::select('SELECT * from daily_pallete_sales INNER JOIN palletes ON palletes.id = daily_pallete_sales.pallete_id WHERE daily_record_id = ? ', [$idDecrypt]);
        $palleteCount = 0;
        $totalPricePalletes = 0.0;

        foreach($palletes as $pallete)
        {
            $palleteCount += $pallete->quantity_send;
            $totalPricePalletes += $pallete->price * $pallete->quantity_send;
        }
        return view('receive', compact('seller', 'totalPricePalletes', 'palleteCount', 'palletes', 'id'));
    }

    public function receiveDispatch(Request $request, $id)
    {
        $idDecrypt = Crypt::decryptString($id);
        $total = 0.00;

        $paletteSales = $request->input('palletes_sale');

        foreach($paletteSales as $palleteId => $quantityTakes)
        {
            $now = Carbon::now();
            $quantity = 0;
            $palleteSale = DailyPalleteSale::where('daily_record_id', $idDecrypt)->where('pallete_id', $palleteId)->first();
            

            if($quantityTakes > $palleteSale->quantity_send)
            {
                $quantity = $palleteSale->quantity_send;
            } 
            elseif($quantityTakes < 0) {
                $quantity = 0;
            }
            else
            {
                $quantity = $quantityTakes;
            }

            $total += ($palleteSale->quantity_send - $quantity) * $palleteSale->price;

            DailyPalleteSale::where('daily_record_id', $idDecrypt)->where('pallete_id', $palleteId)->update(['quantity_sold'=> $quantity]);
        }

        DailyRecord::where('id',$idDecrypt)->update(['total_earned' => $total, 'active' => false, 'arrival_datetime' => $now]);
        return redirect(route('agency.index'));
    }

    public function viewReceive($id)
    {
        $idDecrypt = Crypt::decryptString($id);
        $now = Carbon::now();

        $seller =  DB::select("SELECT seller_id, seller_name, active, total_earned,DATE_FORMAT(daily_records.departure_datetime, '%d/%m/%Y %h:%i %p') AS departure_datetime, DATE_FORMAT(daily_records.arrival_datetime, '%d/%m/%Y %h:%i %p') AS arrival_datetime FROM daily_records INNER JOIN sellers ON daily_records.seller_id = sellers.id WHERE daily_records.id = ?;", [$idDecrypt]);

        if($seller[0]->active) return redirect(route('agency.index'));

        $palletes = DB::select('SELECT * from daily_pallete_sales INNER JOIN palletes ON palletes.id = daily_pallete_sales.pallete_id WHERE daily_record_id = ? ', [$idDecrypt]);

        
        $pdf = Pdf::loadView('receipt', compact('seller', 'palletes'));
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->stream($seller[0]->seller_name.' '.$seller[0]->arrival_datetime);
    }
    
}

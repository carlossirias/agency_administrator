<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DailyRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReceiptsController extends Controller
{
    //
    public function view()
    {
        $actualDate = Carbon::now()->format('Y-m-d');
        $sellersToday = DB::table('daily_records')
        ->select(DB::raw('DATE_FORMAT(daily_records.arrival_datetime, "%d/%m/%Y %h:%i %p") as arrival_datetime'), DB::raw('DATE_FORMAT(daily_records.departure_datetime, "%d/%m/%Y %h:%i %p") as departure_datetime'), 'seller_name', 'seller_image', 'daily_records.id')
        ->join('sellers', 'sellers.id', '=', 'daily_records.seller_id')
        ->where('agency_id', Auth::user()->id)
        ->where('active', false)
        ->whereRaw('DATE(daily_records.arrival_datetime) = '.$actualDate)
        ->get();

        $result = DB::table('daily_records')
        ->select('daily_records.id')
        ->join('sellers', 'daily_records.seller_id', '=', 'sellers.id')
        ->where('agency_id', Auth::user()->id)
        ->whereDate('daily_records.arrival_datetime', '=', now()->toDateString())
        ->where('active', false)
        ->pluck('id');

        $sellersRest = DB::table('daily_records')
        ->select(DB::raw('DATE_FORMAT(daily_records.arrival_datetime, "%d/%m/%Y %h:%i %p") as arrival_datetime'), DB::raw('DATE_FORMAT(daily_records.departure_datetime, "%d/%m/%Y %h:%i %p") as departure_datetime'), 'seller_name', 'seller_image', 'daily_records.id')
        ->join('sellers', 'sellers.id', '=', 'daily_records.seller_id')
        ->where('agency_id', Auth::user()->id)
        ->where('active', false)
        ->whereNotIn('daily_records.id', $result->toArray())
        ->paginate(10);

        
        return view('receipts', compact('sellersToday', 'sellersRest'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class DailyRecord extends Model
{
    use HasFactory;
    protected $table = 'daily_records';

    protected $casts = [
        'departure_datetime' => 'date:Y-m-d',
        'arrival_datetime' => 'datetime:d-m-Y H:00',
    ];


}

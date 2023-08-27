<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Seller extends Model
{
    use HasFactory;
    protected $table = 'sellers';

    protected $fillable = [
        'seller_name',
        'seller_identification_number',
        'seller_phone',
        'seller_adress'
    ];

    protected function sellerPhone(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $this->fixedPhoneNumber($value),
        );
    }

    public function fixedPhoneNumber($string)
    {
        $phone = '';
        for($i = 0; $i < strlen($string); $i++)
        {
            $phone .= $string[$i];

            if((($i+1) % 4) == 0 && $i < (strlen($string) - 1)) $phone .= '-';
        }

        return $phone;
    }
}

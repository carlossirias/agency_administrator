<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agency extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected function agencyPhone():Attribute
    {
        return Attribute::make(
            set: fn($value) => $this->fixedPhoneNumber($value) ,
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

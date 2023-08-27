<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $seller = new Seller();
        $seller->agency_id = 1;
        $seller->seller_name ='Leonel Martinez';
        $seller->seller_phone = '88217823';
        $seller->seller_identification_number ='0011312696980X';
        $seller->enabled = true;
        $seller->seller_adress = 'Sabana Grande, Del cruce de los rieles 2 cuadras al sur.';
        $seller->saveOrFail();

        $seller = new Seller();
        $seller->agency_id = 1;
        $seller->seller_name ='Carlos Sirias';
        $seller->seller_phone = '88278923';
        $seller->seller_identification_number ='0010510012360P';
        $seller->enabled = false;
        $seller->seller_adress = 'Sabana Grande, Del cruce de los rieles 5 cuadras al lago.';
        $seller->saveOrFail();

        $seller = new Seller();
        $seller->agency_id = 1;
        $seller->seller_name ='Carlos Sirias';
        $seller->seller_phone = '88278923';
        $seller->seller_identification_number ='0010510012360P';
        $seller->enabled = true;
        $seller->seller_adress = 'Sabana Grande, Del cruce de los rieles 5 cuadras al lago.';
        $seller->saveOrFail();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $agency = new Agency();
        $agency->agency_name = 'Villa Sol';
        $agency->agency_adress = 'Residencial Villa Sol, Casa F-8-2 Calle 19';
        $agency->agency_phone = '22256765';
        $agency->saveOrFail();
    }

    
}

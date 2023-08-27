<?php

namespace Database\Seeders;

use App\Models\Pallete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PalleteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $helado = new Pallete();
        $helado->pallete_name ='Super Cono';
        $helado->suggested_price = 15.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/04/SUPER-CONO.png';
        $helado->promotion = true;
        $helado->promotion_price = 12.00;
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Super Sandwich';
        $helado->suggested_price = 15.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/04/SUPER-SANDWICH.png';
        $helado->promotion_price = 12.00;
        $helado->saveOrFail();
        

        $helado = new Pallete();
        $helado->pallete_name ='Cono Bola';
        $helado->suggested_price = 15.00;
        $helado->promotion_price = 12.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/04/CONO-BOLA.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Cocoa';
        $helado->suggested_price= 10.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/COCOA-1.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Chocolate con maní';
        $helado->suggested_price = 11.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/CHOCOLATE-CON-MANI-1.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Chocolate';
        $helado->suggested_price = 12.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/04/HELADO-CHOCOLATE.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Fruta rellena';
        $helado->suggested_price = 10.00;
        $helado->promotion_price = 8.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/fruta-rellena.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Tu y yo';
        $helado->suggested_price = 8.00;
        $helado->promotion_price = 6.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/paletas-tu-y-yo-1.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Bolishots';
        $helado->suggested_price = 8.00;
        $helado->promotion_price = 6.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/bolishots-1.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Rocket';
        $helado->suggested_price = 8.00;
        $helado->promotion_price = 6.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/04/ROCKET.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Vasito 3 onzas';
        $helado->suggested_price = 12.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/tacita-3-onz-vainilla-choco.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Rolinpin';
        $helado->suggested_price = 7.00;
        $helado->promotion_price = 6.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/ROLIN-PIN.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Futbolin';
        $helado->suggested_price = 10.00;
        $helado->promotion = true;
        $helado->promotion_price = 8.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/04/futbolin.png';
        $helado->saveOrFail();

        $helado = new Pallete();
        $helado->pallete_name ='Sheikit';
        $helado->suggested_price = 10.00;
        $helado->promotion = true;
        $helado->promotion_price = 8.00;
        $helado->pallete_image ='https://lala.com.gt/wp-content/uploads/2019/03/sheikit.png';
        $helado->saveOrFail();
    }
}

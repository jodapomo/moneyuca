<?php

use Illuminate\Database\Seeder;
use App\Models\Signal;

class SignalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Signal::create([
            'content' => 
'Signal No 2
BUY GBPUSD 1.25636
SL 1.25000
TP 1.27000',
        ]);

        Signal::create([
            'content' => 
'Signal No 5
SELL NZDCAD 0.87517
SL 0.88067
TP 0.86417',
        ]);

        Signal::create([
            'content' => 
'Small traders close the trade.
Others close Half Lot Size and move SL to BE+(+ve side)',
        ]);

        Signal::create([
            'content' => 
'Signal No 8
BUY EURJPY 121.615
SL 121.015
TP 122.215',
        ]);

        Signal::create([
            'content' => 
'Running with 23 PIPS PROFIT✅✅
Small traders close the trades.
Others close Half Lot Size and MOVE SL TO BE+(+ve side)',
        ]);

    }
}

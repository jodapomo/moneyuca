<?php

use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
            'low_capital' => 0,
            'take_profit_limit_1' => 0,
            'take_profit_limit_2' => 0,
            'take_profit_limit_3' => 0,
            'risk' => 0,
        ]);
    }
}

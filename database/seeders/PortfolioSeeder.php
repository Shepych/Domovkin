<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolio_types')->insert([
            'name' => 'Стройка'
        ]);
        DB::table('portfolio_types')->insert([
            'name' => 'Ремонт'
        ]);
        DB::table('portfolio_types')->insert([
            'name' => 'Реставрация'
        ]);
    }
}

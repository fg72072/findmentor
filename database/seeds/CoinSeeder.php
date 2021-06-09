<?php

use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            'no_of_coin' => 100,
        ]);
        DB::table('coins')->insert([
            'no_of_coin' => 200,
            'discount'  => 10,
            'discount_type'  => 'percentage',
        ]);
        DB::table('coins')->insert([
            'no_of_coin' => 300,
        ]);
        DB::table('coins')->insert([
            'no_of_coin' => 400,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                'name' => 'M'
            ],
            [
                'name' => 'L'
            ],
            [
                'name' => "XL"
            ],
            [
                'name' => "XXL"
            ],
            [
                'name' => "XXXL"
            ],
            [
                'name' => "32"
            ],
            [
                'name' => '33'
            ],
            [
                'name' => '34'
            ],
            [
                'name' => '35'
            ],
            [
                'name' => '36'
            ],
            [
                'name' => '37'
            ],
        ];
        foreach ($sizes as $size){
            DB::table('sizes')->insert([
                'name' => $size['name']
        ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class BanknoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('banknotes')->insert([
        [
          'currency_id' => 1,
          'type' => 100,
          'quantity' => 100
        ],
        [
          'currency_id' => 1,
          'type' => 50,
          'quantity' => 100
        ],
        [
          'currency_id' => 1,
          'type' => 20,
          'quantity' => 100
        ],
        [
          'currency_id' => 1,
          'type' => 10,
          'quantity' => 100 
        ],
        [
          'currency_id' => 1,
          'type' => 5,
          'quantity' => 100 
        ],
        [
          'currency_id' => 2,
          'type' => 500,
          'quantity' => 100
        ],
        [
          'currency_id' => 2,
          'type' => 200,
          'quantity' => 100 
        ],
        [
          'currency_id' => 2,
          'type' => 100,
          'quantity' => 100 
        ],
        [
          'currency_id' => 2,
          'type' => 50,
          'quantity' => 100 
        ],
        [
          'currency_id' => 2,
          'type' => 20,
          'quantity' => 100 
        ],
        [
          'currency_id' => 2,
          'type' => 10,
          'quantity' => 100
        ],
        [
          'currency_id' => 3,
          'type' => 50,
          'quantity' => 100 
        ],
        [
          'currency_id' => 3,
          'type' => 20,
          'quantity' => 100 
        ],
        [
          'currency_id' => 3,
          'type' => 10,
          'quantity' => 100 
        ],
        [
          'currency_id' => 3,
          'type' => 5,
          'quantity' => 100
        ],
        [
          'currency_id' => 4,
          'type' => 10000,
          'quantity' => 100
        ],
        [
          'currency_id' => 4,
          'type' => 5000,
          'quantity' => 100
        ],
        [
          'currency_id' => 4,
          'type' => 1000,
          'quantity' => 100
        ],
        [
          'currency_id' => 5,
          'type' => 1000,
          'quantity' => 100
        ],
        [
          'currency_id' => 5,
          'type' => 500,
          'quantity' => 100 
        ],
        [
          'currency_id' => 5,
          'type' => 100,
          'quantity' => 100 
        ],
        [
          'currency_id' => 5,
          'type' => 50,
          'quantity' => 100
        ],
        [
          'currency_id' => 5,
          'type' => 20,
          'quantity' => 100 
        ],
        [
          'currency_id' => 6,
          'type' => 100,
          'quantity' => 100
        ],
        [
          'currency_id' => 6,
          'type' => 50,
          'quantity' => 100 
        ],
        [
          'currency_id' => 6,
          'type' => 20,
          'quantity' => 100 
        ],
        [
          'currency_id' => 6,
          'type' => 10,
          'quantity' => 100 
        ],
        [
          'currency_id' => 6,
          'type' => 5,
          'quantity' => 100
        ],
        [
          'currency_id' => 7,
          'type' => 100,
          'quantity' => 100 
        ],
        [
          'currency_id' => 7,
          'type' => 50,
          'quantity' => 100 
        ],
        [
          'currency_id' => 7,
          'type' => 20,
          'quantity' => 100 
        ],
        [
          'currency_id' => 7,
          'type' => 10,
          'quantity' => 100 
        ],
        [
          'currency_id' => 7,
          'type' => 5,
          'quantity' =>100 
        ],
        [
          'currency_id' => 8,
          'type' => 100,
          'quantity' => 100
        ],
        [
          'currency_id' => 8,
          'type' => 50,
          'quantity' => 100 
        ],
        [
          'currency_id' => 8,
          'type' => 20,
          'quantity' => 100 
        ],
        [
          'currency_id' => 8,
          'type' => 10, 
          'quantity' => 100 
        ],
        [
          'currency_id' => 8,
          'type' => 5,
          'quantity' => 100 
        ],
        [
          'currency_id' => 9,
          'type' => 50000,
          'quantity' => 100 
        ],
        [
          'currency_id' => 9,
          'type' => 10000,
          'quantity' => 100
        ],
        [
          'currency_id' => 9,
          'type' => 5000,
          'quantity' => 100
        ],
        [
          'currency_id' => 9,
          'type' => 1000,
          'quantity' => 100
        ],
        [
          'currency_id' => 10,
          'type' => 100,
          'quantity' => 100
        ],
        [
          'currency_id' => 10,
          'type' => 50,
          'quantity' => 100 
        ],
        [
          'currency_id' => 10,
          'type' => 20,
          'quantity' => 100
        ],
        [
          'currency_id' => 10,
          'type' => 10,
          'quantity' => 100 
        ],
        [
          'currency_id' => 10,
          'type' => 5,
          'quantity' => 100 
        ]
      ]);
    }
}

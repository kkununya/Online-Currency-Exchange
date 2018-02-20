<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('customers')->insert([
            'id_type' => "ID",
            'card_id' => random_int(10000, 99999999),
            'nation' => "Thai",
            'name_title' => "Mr.",
            'first_name' => str_random(random_int(5, 10)),
            'last_name'=> str_random(random_int(5, 10)),
            'email' => "test@gmail.com",
            'telephone_no' => "0816574325",
            'address' => str_random(random_int(15, 25)),
            'province'=> str_random(random_int(5, 10)),
            'district' => str_random(random_int(5, 10)),
            'sub_district' => str_random(random_int(5, 10)),
            'postal_code' => random_int(10000, 20000)
        ]);

        DB::table('currencies')->insert([
            [
              'label' => "USD",
              'sale_rate' => "33.51",
              'purchase_rate' => "32.12"
            ],
            [
              'label' => "EUR",
              'sale_rate' => "39.82",
              'purchase_rate' => "38.74"
            ],
            [
              'label' => "GBP",
              'sale_rate' => "45.31",
              'purchase_rate' => "43.14"
            ],
            [
              'label' => "JPY",
              'sale_rate' => "30.42",
              'purchase_rate' => "29.14"
            ],
            [
              'label' => "HKD",
              'sale_rate' => "4.34",
              'purchase_rate' => "4.16"
            ],
            [
              'label' => "AUD",
              'sale_rate' => "26.47",
              'purchase_rate' => "25.25"
            ],
            [
              'label' => "AUD",
              'sale_rate' => "26.47",
              'purchase_rate' => "25.25"
            ],
            [
              'label' => "CNY",
              'sale_rate' => "5.21",
              'purchase_rate' => "4.70"
            ],
            [
              'label' => "KRW",
              'sale_rate' => "3.34",
              'purchase_rate' => "2.31"
            ]
        ]);
    }
}

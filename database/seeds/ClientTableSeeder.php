<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \LaravelAngular\Entities\Client::truncate();
        factory(\LaravelAngular\Entities\Client::class, 10)->create();
    }

}

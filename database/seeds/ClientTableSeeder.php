<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //\ProjetoAngular\Entities\Client::truncate();
        factory(\ProjetoAngular\Entities\Client::class, 10)->create();
    }

}

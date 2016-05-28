<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //\ProjetoAngular\Entities\Client::truncate();
        factory(\ProjetoAngular\Entities\User::class, 10)->create();
        /*factory(\ProjetoAngular\Entities\User::class)->create([
            'name' => 'Yasmany',
            'email' => 'ygc_21@hotmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)
        ]);*/
    }

}

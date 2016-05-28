<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //\ProjetoAngular\Entities\Project::truncate();
        factory(\ProjetoAngular\Entities\Project::class, 10)->create();
    }

}

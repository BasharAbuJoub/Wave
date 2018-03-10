<?php

use Illuminate\Database\Seeder;
use App\Device;
use App\Lecture;

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


        factory(Lecture::class, 2)->create();

        // factory(App\Hall::class, 5)->create()->each(function($hall){
        //     $hall->device()->save(factory(Device::class)->make());
        // });

        // factory(App\Office::class, 5)->create()->each(function($hall){
        //     $hall->device()->save(factory(Device::class)->make());
        // });

    }
}

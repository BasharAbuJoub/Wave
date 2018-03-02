<?php

use Faker\Generator as Faker;
use App\Hall;
use App\Device;
use App\Office;
use App\Lecture;
use Carbon\Carbon;

$factory->define(Hall::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(Office::class, function (Faker $faker) {
    return [
        'instructor' => 'Dr.' . $faker->firstNameMale . ' ' . $faker->lastName,
        'bio'        => $faker->sentence(6, true)
    ];
});



$factory->define(Device::class, function (Faker $faker){
    return [
        'ip'    => $faker->localIpv4,
        'room'  => '1G' . $faker->randomNumber(2, true),
    ];
});



$factory->define(Lecture::class, function (Faker $faker){
    return [
        'course'    => $faker->word . ' course',
        'start'     => Carbon::now()->addMinutes(rand(0, 10))->toTimeString(),
        'end'       => Carbon::now()->addMinutes(rand(30, 120))->toTimeString(),
        'office_id' => factory(Office::class)->create()->device()->create(factory(Device::class)->raw())->deviceable->id,
        'hall_id'   => factory(Hall::class)->create()->device()->create(factory(Device::class)->raw())->deviceable->id,
        'days'      => [0,2,4],
    ];
});

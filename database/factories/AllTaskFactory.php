<?php

$factory->define(App\AllTask::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "task_belongs_to" => $faker->name,
        "in_analysis" => 0,
        "in_process" => 0,
        "done" => 0,
    ];
});

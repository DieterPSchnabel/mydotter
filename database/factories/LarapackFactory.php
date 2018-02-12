<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admintests\Larapack::class, function (Faker $faker) {
    return [
        'tag1' => $faker->word,
        'tag2' => $faker->word,
        'tag3' => $faker->word,
        'install_str' => substr($faker->sentence(2), 0, -1),
        'git_url' => $faker->url,
        'doc_url' => $faker->url,
        'is_installed' => $faker->boolean($chanceOfGettingTrue = 50) ,
        'description' => $faker->paragraph,
    ];
});

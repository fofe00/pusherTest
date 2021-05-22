<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(20),
        'subtitle'=>$faker->sentence(12),
        'message'=>$faker->sentence(22),
        'imgUrl'=>"IMG-20210501-WA0246_1619905016_.jpg",
    ];
});

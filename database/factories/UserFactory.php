<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' => $faker->numberBetween(1, 3),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4, 6),
        'body' => $faker->paragraphs(rand(1, 3), true),
        'photo_id' => 2,
        // 'category_id' => $faker->numberBetween(1, 5),
        'user_id' => $faker->numberBetween(1, 10),
        'slug'=>$faker->slug(), 
    ];
});





// $factory->define(App\Role::class, function (Faker $faker) {
//     return [
//         'name' => $faker->randomElement(['administrator', 'author', 'subscriber', 'public', 'guest'])
//     ];
// });

// $factory->define(App\Category::class, function (Faker $faker) {
//     return [
//         'name' => $faker->randomElement(['Programming', 'games', 'live', 'men', 'women', 'stars', 'space', 'earth', 'cars', 'natural'])
//     ];
// });

// $factory->define(App\Photo::class, function (Faker $faker) {
//     return [
//         'file' => 'default.jpg',
//         'file' => 'default-post.jpg',
//     ];
// });


$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 10),
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 1,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true),
    ];
});

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'is_active' => 1,
        'author' => $faker->name,
        'photo' => 1,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true),
    ];
});
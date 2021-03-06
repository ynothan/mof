<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $type = ['admin', 'adminR', 'adminD', 'candidate'];
    $rand = array_rand($type);
    return [
        'name'                  => $faker->lastName,
        'firstName'             => $faker->firstName($gender = null |'male'|'female'),
        'email'                 => $faker->unique()->safeEmail,
        'password'              => $password ?: $password = bcrypt('secret'),
        'remember_token'        => str_random(10),
        'type'                  => $type[$rand],
        'role_id'               => null,
        'medal_id'              => rand(1,4),
        'speciality_id'         => null,
        'profile_id'            => null
    ];
});

// Fakers pour les établissements (Establishment)
$factory->define(App\Establishment::class, function(Faker\Generator $faker){

    return [
        'establishment_name'                  => $faker->streetName,
        'establishment_address'               => $faker->streetAddress,
        'establishment_city'                  => $faker->city,
        'establishment_zip_code'              => $faker->buildingNumber,
        'establishment_phone'                 => $faker->phonenumber,
        'establishment_email'                 => $faker->unique()->safeEmail,
        'establishment_manager_lastName'      => $faker->lastName,
        'establishment_manager_firstName'     => $faker->firstName($gender = null|'male'|'female'),
        'department_id'                       => rand(1, 101)
    ];

});
// Fakers pour les entreprises (Companies)
$factory->define(App\Company::class, function(Faker\Generator $faker){

    return [
        'company_name'                   => $faker->streetName,
        'company_address'                => $faker->streetAddress,
        'company_city'                   => $faker->city,
        'company_zip_code'               => $faker->buildingNumber,
        'company_phone'                  => $faker->phonenumber,
        'company_email'                  => $faker->unique()->safeEmail,
        'company_manager_lastName'       => $faker->lastName,
        'company_manager_firstName'      => $faker->firstName($gender = null|'male'|'female'),
        'department'                     => rand(1, 101)
    ];

});

$factory->define(App\Speciality::class, function(Faker\Generator $faker){

    return [
        'speciality_name' => $faker->jobTitle,
        'speciality_code' => $faker->buildingNumber
    ];
});

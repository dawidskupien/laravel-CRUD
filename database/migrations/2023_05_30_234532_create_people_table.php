<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

return new class extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            // Dodaj inne właściwości obiektu People, jeśli są wymagane
            $table->timestamps();
        });

        // Wypełnienie tabeli danymi przy użyciu Faker
        $faker = Faker::create();
        for ($i = 0; $i < 200; $i++) {
            DB::table('people')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'phone' => $faker->phoneNumber,
                'address' => $faker->streetAddress,
                'city' => $faker->city,
            ]);
        }
    }
    
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};

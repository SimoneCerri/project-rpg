<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $character = new Character();
            $character->name = $faker->name();
            $character->description = $faker->text(200);
            $character->attack = rand(10, 50);
            $character->defense = rand(10, 50);
            $character->speed = rand(10, 50);
            $character->save();
        }
    }
}

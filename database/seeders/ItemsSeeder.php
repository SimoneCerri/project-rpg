<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $items = json_decode(file_get_contents('config\db.json'), true);

        foreach ($items as $item) {
            $newItem = New Item();
            $newItem->name= $item['name'];
            $newItem->slug= $item['slug'];
            $newItem->type= $item['type'];
            $newItem->category= $item['category'];
            $newItem->weight= $item['weight'];
            $newItem->cost= $item['cost'];
            $newItem->damage_dice= $item['damage_dice'];
            $newItem->save();

        }
    }
}

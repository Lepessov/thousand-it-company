<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $society = Category::create(['name' => 'Общество']);
        $city_life = Category::create(['name' => 'Городская жизнь', 'parent_id' => $society->id]);
        $elections = Category::create(['name' => 'Выборы', 'parent_id' => $society->id]);

        $city_day = Category::create(['name' => 'День города']);
        $fireworks = Category::create(['name' => 'Салюты', 'parent_id' => $city_day->id]);
        $playground = Category::create(['name' => 'Детская площадка', 'parent_id' => $city_day->id]);
        Category::create(['name' => '0-3 года', 'parent_id' => $playground->id]);
        Category::create(['name' => '3-7 лет', 'parent_id' => $playground->id]);

        Category::create(['name' => 'Спорт']);
    }
}

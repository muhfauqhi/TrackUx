<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Skateboard',
            'slug' => str_slug('skateboard')
        ]);

        Category::create([
            'name' => 'BMX Racing',
            'slug' => str_slug('bmx racing')
        ]);

        Category::create([
            'name' => 'Surfing',
            'slug' => str_slug('surfing')
        ]);

        Category::create([
            'name' => 'Freestyle Scooter',
            'slug' => str_slug('freestyle scooter')
        ]);

        Category::create([
            'name' => 'Tutorial',
            'slug' => str_slug('tutorial')
        ]);
    }
}

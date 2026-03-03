<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Gleznas',
                'slug' => 'gleznas',
                'description' => 'Rokām gleznoti mākslas darbi dažādos stilos un izmēros',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Kurbāžņi',
                'slug' => 'kurbazni',
                'description' => 'Pīti kurbāžņi un groziņi no dabīgiem materiāliem',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Krāsotas pudeles',
                'slug' => 'krasotas-pudeles',
                'description' => 'Dekoratīvas pudeles ar unikāliem ornamentiem',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Keramika',
                'slug' => 'keramika',
                'description' => 'Keramikas izstrādājumi - krūzes, vāzes, šķīvji',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

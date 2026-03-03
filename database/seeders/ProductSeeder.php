<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Iegūstam kategorijas
        $gleznas = Category::where('slug', 'gleznas')->first();
        $kurbazni = Category::where('slug', 'kurbazni')->first();
        $pudeles = Category::where('slug', 'krasotas-pudeles')->first();
        $keramika = Category::where('slug', 'keramika')->first();

        $products = [
            // Gleznas
            [
                'category_id' => $gleznas->id,
                'name' => 'Vasaras ainava',
                'slug' => 'vasaras-ainava',
                'description' => 'Krāsaina vasaras ainava ar ziedošiem laukiem. Akrils uz audekla, 40x50 cm.',
                'price' => 45.00,
                'sku' => 'PAINT-001',
                'quantity' => 1,
                'is_sold' => false,
            ],
            [
                'category_id' => $gleznas->id,
                'name' => 'Jūras rīts',
                'slug' => 'juras-rits',
                'description' => 'Mierīgs jūras rīts ar burātājiem. Eļļa uz audekla, 50x70 cm.',
                'price' => 65.00,
                'sku' => 'PAINT-002',
                'quantity' => 1,
                'is_sold' => false,
            ],
            [
                'category_id' => $gleznas->id,
                'name' => 'Rudens parks',
                'slug' => 'rudens-parks',
                'description' => 'Zeltains rudens parks ar krītošām lapām. Akrils uz audekla, 30x40 cm.',
                'price' => 38.00,
                'sku' => 'PAINT-003',
                'quantity' => 1,
                'is_sold' => false,
            ],

            // Kurbāžņi
            [
                'category_id' => $kurbazni->id,
                'name' => 'Pīts groziņš ar ziediem',
                'slug' => 'pits-grozins-ar-ziediem',
                'description' => 'Roku darba pīts kurbāznis ar dekoratīviem ziediem. Izmērs: 25x30 cm.',
                'price' => 28.00,
                'sku' => 'BASKET-001',
                'quantity' => 1,
                'is_sold' => false,
            ],
            [
                'category_id' => $kurbazni->id,
                'name' => 'Liels iepirkumu grozs',
                'slug' => 'liels-iepirkumu-grozs',
                'description' => 'Izturīgs pīts grozs iepirkumiem. Ar ādas rokturiem. 35x40 cm.',
                'price' => 42.00,
                'sku' => 'BASKET-002',
                'quantity' => 1,
                'is_sold' => false,
            ],

            // Krāsotas pudeles
            [
                'category_id' => $pudeles->id,
                'name' => 'Vintage pudele ar ornamentiem',
                'slug' => 'vintage-pudele-ar-ornamentiem',
                'description' => 'Dekoratīva stikla pudele ar gleznotu ornamentisku rakstu. Augstums 30 cm.',
                'price' => 15.00,
                'sku' => 'BOTTLE-001',
                'quantity' => 1,
                'is_sold' => false,
            ],
            [
                'category_id' => $pudeles->id,
                'name' => 'Ziedu motīvu pudele',
                'slug' => 'ziedu-motivu-pudele',
                'description' => 'Elegantas pudeles ar ziedu kompozīciju. Augstums 25 cm.',
                'price' => 18.00,
                'sku' => 'BOTTLE-002',
                'quantity' => 1,
                'is_sold' => false,
            ],

            // Keramika
            [
                'category_id' => $keramika->id,
                'name' => 'Roku darba krūze',
                'slug' => 'roku-darba-kruze',
                'description' => 'Unikāla keramikas krūze ar dabīgu glazūru. Tilpums 350ml.',
                'price' => 22.00,
                'sku' => 'CERAMIC-001',
                'quantity' => 1,
                'is_sold' => false,
            ],
            [
                'category_id' => $keramika->id,
                'name' => 'Dekoratīva vāze',
                'slug' => 'dekorativa-vaze',
                'description' => 'Keramikas vāze ar unikālu formu un glazūru. Augstums 28 cm.',
                'price' => 35.00,
                'sku' => 'CERAMIC-002',
                'quantity' => 1,
                'is_sold' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::updateOrCreate(
            ['name' => 'Tabla de surf'],
            [
                'description' => 'Tabla ligera de fibra de carbono',
                'price' => 100,
                'image' => "surf.jpg"
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Traje de neopreno'],
            [
                'description' => 'Neopreno elástico fabricado con poliéster',
                'price' => 95,
                'image' => 'neoprene.jpg'
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Gafas de sol'],
            [
                'price' => 20,
                'image' => 'sunglasses.jpg'
            ]
        );
    }
}

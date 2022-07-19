<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Producto 1',
            'description' => '',
            'price' => '123.45',
            'tax' => '5',
            'image' => 'https://definicion.de/wp-content/uploads/2009/06/producto.png',
        ]);

        Product::create([
            'name' => 'Producto 2',
            'description' => '',
            'price' => '45.65',
            'tax' => '15',
            'image' => 'https://rockcontent.com/es/wp-content/uploads/sites/3/2019/02/produto-vs-servico-1024x538.png',
        ]);

        Product::create([
            'name' => 'Producto 3',
            'description' => '',
            'price' => '39.73',
            'tax' => '12',
            'image' => 'https://uploadgerencie.com/imagenes/devolucion-productos.png',
        ]);

        Product::create([
            'name' => 'Producto 4',
            'description' => '',
            'price' => '250.00',
            'tax' => '8',
            'image' => 'https://blog.comparasoftware.com/wp-content/uploads/2021/02/fichas-de-producto-pensadas-en-los-clientes.png',
        ]);

        Product::create([
            'name' => 'Producto 5',
            'description' => '',
            'price' => '59.35',
            'tax' => '10',
            'image' => 'https://blog.dinterweb.com/hubfs/Imported_Blog_Media/38060627_ml-e1482765993493.jpg',
        ]);
    }
}

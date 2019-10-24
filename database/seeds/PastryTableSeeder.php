<?php

use App\Models\Pastry;
use Illuminate\Database\Seeder;

class PastryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pastry::create([
            'name' => 'Queijo',
            'price' => 5.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Carne',
            'price' => 5.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Frango',
            'price' => 5.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Pizza',
            'price' => 6.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Frango com Catupiry',
            'price' => 8.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Palmito',
            'price' => 7.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Calabresa',
            'price' => 5.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Chocolate',
            'price' => 6.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Doce de Leite',
            'price' => 6.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Beijinho',
            'price' => 6.50,
            'image' => 'pastel.jpg',
        ]);
        Pastry::create([
            'name' => 'Especial',
            'price' => 10.50,
            'image' => 'pastel.jpg',
        ]);
    }
}

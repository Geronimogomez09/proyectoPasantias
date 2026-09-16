<?php

namespace Database\Seeders;

use App\models\producto;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::create([
    'nombre' => 'air 300',
    'descripcion' => 'zapatilla deportiva de la marca Nike',
    'descripcion_larga' => 'zapatilla de tela y suela caucho',
    'precio' => 234,
    'stock' => 20,
]);

Producto::create([
    'nombre' => 'flichx',
    'descripcion' => 'zapatilla urbana de la marca Sketcher',
    'descripcion_larga' => 'zapatilla de tela y suela caucho',
    'precio' => 144,
    'stock' => 20,
]);

Producto::create([
    'nombre' => 'mocachi city',
    'descripcion' => 'zapato formal de la marca ShoeStore',
    'descripcion_larga' => 'zapato de cuero y suela goma - caucho',
    'precio' => 424,
    'stock' => 20,
]);

Producto::create([
    'nombre' => 'Magna004',
    'descripcion' => 'zapato borcego de la marca Briganti',
    'descripcion_larga' => 'de cuero de vaca, con suela de caucho, goma',
    'precio' => 234,
    'stock' => 20,
]);

Producto::create([
    'nombre' => 'aconcagua II',
    'descripcion' => 'zapatilla de la marca Montagne',
    'descripcion_larga' => 'zapatilla de tela, kevlar y suela caucho. impermeable, respirable',
    'precio' => 634,
    'stock' => 20,
]);
    }
}

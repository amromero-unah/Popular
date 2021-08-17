<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_producto'=> $this->faker->randomElement($array = array ('Papel','Lapiz','Laptop', 'Colores', 'Silla', 'Mesa')),
            'categoria_producto' =>$this->faker->randomElement($array = array ('Papeleria','Informática','Ofimática')),
            'precio_compra'=> $this->faker->numberBetween($min = 10, $max = 15),
            'precio_venta'=> $this->faker->numberBetween($min = 16, $max = 20)
        ];
    }
}

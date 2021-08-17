<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_proveedor'=> $this->faker->firstName .' '.$this->faker->lastName ,
            'correo_proveedor' =>$this->faker->email, 
            'telefono_proveedor'=> $this->faker->numerify('########'),
            'nombre_contacto_proveedor'=> $this->faker->firstName .' '.$this->faker->lastName 
        ];
    }
}

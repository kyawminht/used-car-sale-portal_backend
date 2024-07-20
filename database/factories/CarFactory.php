<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model =Car::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'make' => $this->faker->randomElement(['Mercedes', 'BMW', 'Audi', 'Toyota', 'Honda']),
            'model' => $this->faker->word,
            'registration_year' => $this->faker->year,
            'price' => $this->faker->randomFloat(2, 5000, 50000),
            'description' => $this->faker->paragraph,
            'picture_url' => $this->faker->randomElement(['https://imgd.aeplcdn.com/664x374/n/cw/ec/116201/c-class-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80','https://www.inghamdriven.nz/wp-content/files/stock/INT/7187/19489_01.jpg?width=2048&optimize=medium','https://global.toyota/pages/news/images/2023/06/21/1330/001.jpg','https://global.toyota/pages/news/images/2021/04/05/1300/20210405_01_01_s.jpg','https://www.topgear.com/sites/default/files/2023/09/33136-RS7PERFORMANCEASCARIBLUEJORDANBUTTERS208.jpg','https://imgd.aeplcdn.com/664x374/n/cw/ec/48342/rs7-sportback-exterior-right-front-three-quarter-3.jpeg?q=80','https://imgd.aeplcdn.com/664x374/n/cw/ec/27074/civic-exterior-right-front-three-quarter-148155.jpeg?q=80','https://www.motortrend.com/uploads/sites/10/2023/10/2024-honda-civic-sport-sedan-angular-front.png']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

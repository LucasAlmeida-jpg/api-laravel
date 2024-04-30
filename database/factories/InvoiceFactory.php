<?php

namespace Database\Factories;

use App\Models\User; // Import the User model
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $paid = $this->faker->boolean();

        return [
            'user_id' => User::all()->random()->id, // Corrected syntax here
            'type' => $this->faker->randomElement(['B', 'C', 'P']),
            'paid' => $paid,
            'value' => $this->faker->numberBetween(1000, 10000), // Corrected method name here
            'payment_date' => $paid ? $this->faker->randomElement([$this->faker->dateTimeThisMonth()]) : null, // Corrected syntax here
        ];
    }
}

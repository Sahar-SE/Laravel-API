<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement(['Billed', 'paid', 'void']);
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(1000, 100000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'paid_date' => $status == 'paid' ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
        ];
    }
}

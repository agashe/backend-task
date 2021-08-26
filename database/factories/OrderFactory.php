<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = mt_rand(1, 5);
        $date = Carbon::create(2021, 8, 1, 0, 0, 0);
        
        return [
            'code' => 'GU-00' . $id,
            'user_id' => $id,
            'status' => Order::$statuses[mt_rand(0, 4)],
            'created_at' => $date->addDays(mt_rand(1, 30))->format('Y-m-d H:i:s') 
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

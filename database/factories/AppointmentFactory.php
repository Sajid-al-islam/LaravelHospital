<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber,
            'age' => $this->faker->numberBetween($min = 1, $max = 80),
            'blood_group' => $this->faker->name(),
            'department' => $this->faker->numberBetween($min = 1, $max = 80),
            'doctor_id' => $this->faker->numberBetween($min = 1, $max = 80),
            'appointment_time' => date('y-d-m'),
        ];
    }
}

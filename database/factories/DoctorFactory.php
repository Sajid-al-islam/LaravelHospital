<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'department_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'photo' => $this->faker->imageUrl(900, 300),
            'speciality' => Str::random(11),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}

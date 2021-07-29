<?php

namespace Database\Factories;

use App\Models\CtmPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class CtmPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CtmPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text(),
            'like_count' => \random_int(10, 200)
        ];
    }
}

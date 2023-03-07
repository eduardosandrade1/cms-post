<?php

namespace Database\Factories;

use App\Models\PostUserLike;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostUserLikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostUserLike::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => 1,
            'user_id' => 2,
        ];
    }
}

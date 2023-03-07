<?php

namespace Database\Factories;

use App\Models\ItemLayout;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemLayoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ItemLayout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeItems = [
            'image',
            'title',
            'subtitle',
            'description',
        ];

        return [
            'text' => $this->faker->text(200),
            'type' => $typeItems[rand(0, 3)],
            'order' => rand(1, 4),
            'post_id' => function () {
                return Post::factory()->create();
            }
        ];
    }
}

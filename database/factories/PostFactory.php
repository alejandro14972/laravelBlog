<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categoryIds = [1, 2, 3, 4];
        $userids = [1,2];
        $defaultImageUrl = asset('http://127.0.0.1:8000/images/images.png');

        return [
            //
            'title' => $this->faker->sentence(5),
            'body' => $this->faker->paragraph(100),
            'user_id' => $this->faker->randomElement($userids),
            'image_url' => $defaultImageUrl, 
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}

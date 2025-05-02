<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory {
	protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition (): array {
        return [
            'title' => $this->faker->sentence(3) ,
            'slug' => $this->faker->slug() ,
            'summary' => $this->faker->paragraph(2) ,
            'body' => $this->faker->paragraph(10) ,
        ];
    }
}

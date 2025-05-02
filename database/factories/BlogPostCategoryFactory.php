<?php

namespace Database\Factories;

use App\Models\BlogPostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostCategoryFactory extends Factory {
	protected $model = BlogPostCategory::class;

	public function definition (): array {
		return [
            'title' => $this->faker->word() ,
		];
	}
}

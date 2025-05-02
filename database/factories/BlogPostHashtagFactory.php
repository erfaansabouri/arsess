<?php

namespace Database\Factories;

use App\Models\BlogPostHashtag;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostHashtagFactory extends Factory {
	protected $model = BlogPostHashtag::class;

	public function definition (): array {
		return [
            'title' => $this->faker->word() ,
		];
	}
}

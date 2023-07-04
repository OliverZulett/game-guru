<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  protected $model = Post::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $users = User::all();
    return [
      'title' => fake()->words(10, true),
      'abstract' => fake()->words(20, true),
      'content' => fake()->words(rand(500, 2000), true),
      'user_id' => $users[rand(0, count($users) - 1)],
    ];
  }
}

<?php
namespace Database\Factories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
class ProductFactory extends Factory {
    public function definition() {
        return [
            'user_id' => User::where('role', 'seller')->inRandomOrder()->first()->id ?? User::factory()->create(['role'=>'seller']),
            'category_id' => Category::factory(),
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(10000, 500000),
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->paragraph,
            'image' => 'products/sample.jpg',
        ];
    }
}
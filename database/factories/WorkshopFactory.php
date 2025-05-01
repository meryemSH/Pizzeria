<?php

namespace Database\Factories;

use App\Models\Workshop;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workshop>
 */
class WorkshopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(3, true),
            'duree' => $this->faker->randomElement(['offline', 'online']),
            'type' => fake()->randomElement(['day', 'week','month','quarter']),
            'age' => $this->faker->numberBetween(5, 18),
            'timetables' => $this->faker->optional()->sentence,
            'teacher' => $this->faker->optional()->name,
            'price' => $this->faker->numberBetween(10, 100),
            'old_price' => $this->faker->numberBetween(5, 90),
            'effectif' => $this->faker->numberBetween(5, 30),
            'is_published' => true, // Publié par défaut
            'publish_date' => now(), // Date actuelle par défaut
            'category_item_id' => null,
        ];

    }

    public function configure(): WorkshopFactory
    {
        return $this->afterCreating(function (Workshop $workshop) {
            try {
                $workshop
                    ->addMedia($this->getRandomFile())
                    ->preservingOriginal()
                    ->toMediaCollection('images');
            } catch (UnreachableUrl $exception) {
                return;
            }
        });
    }

    public function getRandomFile(): SplFileInfo
    {
        return collect(
            File::files(base_path('local_images'))
        )->random();
    }
}

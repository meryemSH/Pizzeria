<?php

namespace Database\Factories;

use App\Enums\SchoolPartnershipEnums;
use App\Enums\schoolPartnershipsActivityEnums;
use App\Models\SchoolPartnership;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl;
use Symfony\Component\Finder\SplFileInfo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolPartnership>
 */
class SchoolPartnershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->word,
            'company_name' => $this->faker->word,
            'company_city_id' => $this->faker->randomNumber(),
            'company_address' => $this->faker->word,
            'responsible_name' => $this->faker->word,
            'responsible_email' => $this->faker->safeEmail(),
            'responsible_phone' => $this->faker->bothify('06########'),
            'company_phone' => $this->faker->bothify('05########'),
            'company_email' => $this->faker->safeEmail(),
            'content' => $this->faker->paragraphs(5, true),
            'status' => $this->faker->randomElement(SchoolPartnershipEnums::cases())->value,
            'is_published' => $this->faker->boolean,
            'activity' => $this->faker->randomElement(schoolPartnershipsActivityEnums::cases())->value,
            'published_at' => $this->faker->dateTime(),
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (SchoolPartnership $model) {
            try {
                // store the random file in storage and retrieve its path to store in the database
                $file = $this->getRandomFile()->getPath() . DIRECTORY_SEPARATOR . $this->getRandomFile()->getFilename();
                $path = Storage::putFile('local_images', $file);

                if ($path === false) {
                    return;
                }

                $model->image = $path;
                $model->save();
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

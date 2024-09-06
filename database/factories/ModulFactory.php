<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modul>
 */
class ModulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $filePath = $this->faker->file(storage_path('app/public/modul'), 'storage/app/public/modul', false);

        return [
            'judul' => $this->faker->name(),
            'deskripsi' => $this->faker->paragraph(),
            'file' => $filePath,
        ];
    }
}

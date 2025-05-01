<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Seeder;
use App\Enums\WorshopsTypeEnums;
use App\Enums\WorshopsDureeEnums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed 3 workshops en ligne
        for ($i = 0; $i < 3; $i++) {
            $workshop = Workshop::create([
                'name' => 'Atelier en ligne ' . ($i + 1),
                'slug' => 'atelier-en-ligne-' . ($i + 1),
                'description' => 'Description de l\'atelier en ligne ' . ($i + 1),
                'content' => 'Contenu de l\'atelier en ligne ' . ($i + 1),
                'is_published' => true,
                'publish_date' => now(),
                'price' =>  random_int(10, 100),
                'old_price' =>  random_int(10, 100),
                'category_item_id' => 1, // Remplacez par l'ID de la catégorie appropriée
                'duree' => WorshopsDureeEnums::randomValue(),
                'type' => WorshopsTypeEnums::online(),
                'age' =>  random_int(18, 100),
                'effectif' =>  random_int(5, 20),
            ]);

               // Chemin du fichier local
        $filePath = storage_path('app/public/assets/images/image1.png');

        // Vérifiez si le fichier existe
        if (file_exists($filePath)) {
            // Créez une instance de UploadedFile
            $file = new UploadedFile($filePath, 'image1.png', 'image/png', null, true);

            // Ajoutez l'image au modèle
            $workshop->addFromRequest('image', $file)->toMediaCollection('images');
        }
        }

        // Seed 3 workshops hors ligne
        for ($i = 0; $i < 3; $i++) {
            $workshop = Workshop::create([
                'name' => 'Atelier hors ligne ' . ($i + 1),
                'slug' => 'atelier-hors-ligne-' . ($i + 1),
                'description' => 'Description de l\'atelier hors ligne ' . ($i + 1),
                'content' => 'Contenu de l\'atelier hors ligne ' . ($i + 1),
                'is_published' => true,
                'publish_date' => now(),
                'price' => random_int(10, 100),
                'old_price' =>  random_int(10, 100),
                'category_item_id' => 1, // Remplacez par l'ID de la catégorie appropriée
                'duree' => WorshopsDureeEnums::randomValue(),
                'type' => WorshopsTypeEnums::offline(),
                'age' =>  random_int(18, 100),
                'effectif' =>  random_int(5, 20),
                'timetables' => 'Horaires de l\'atelier hors ligne ' . ($i + 1),
                'teacher' => 'Nom du professeur ' . ($i + 1),
            ]);

               // Chemin du fichier local
        $filePath = storage_path('app/public/assets/images/image1.png');

        // Vérifiez si le fichier existe
        if (file_exists($filePath)) {
            // Créez une instance de UploadedFile
            $file = new UploadedFile($filePath, 'image1.png', 'image/png', null, true);

            // Ajoutez l'image au modèle
            $workshop->addFromRequest('image', $file)->toMediaCollection('images');
        }

        }
    }
}

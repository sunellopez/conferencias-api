<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conferencia;

class ConferenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conferencias = [
            [
                'nombre' => 'Inteligencia Artificial',
                'fecha' => '2025-10-15',
                'ponente' => 'Dr. García',
                'descripcion' => 'Introducción a la IA y sus aplicaciones en la vida real.',
            ],
            [
                'nombre' => 'Ciberseguridad',
                'fecha' => '2025-11-01',
                'ponente' => 'Ing. Pérez',
                'descripcion' => 'Protección de datos y buenas prácticas de seguridad en la nube.',
            ],
            [
                'nombre' => 'Blockchain',
                'fecha' => '2025-12-05',
                'ponente' => 'Mtra. López',
                'descripcion' => 'Cómo funciona la tecnología blockchain y su impacto en finanzas.',
            ],
            [
                'nombre' => 'Desarrollo Web Moderno',
                'fecha' => '2025-09-30',
                'ponente' => 'Lic. Martínez',
                'descripcion' => 'Frameworks actuales y buenas prácticas de desarrollo web.',
            ],
            [
                'nombre' => 'Machine Learning Avanzado',
                'fecha' => '2025-12-20',
                'ponente' => 'Dra. Sánchez',
                'descripcion' => 'Técnicas avanzadas de ML y casos de estudio reales.',
            ],
            [
                'nombre' => 'Computación Cuántica',
                'fecha' => '2026-01-10',
                'ponente' => 'Dr. Ramírez',
                'descripcion' => 'Principios básicos de la computación cuántica y sus retos actuales.',
            ],
            [
                'nombre' => 'Realidad Aumentada y Virtual',
                'fecha' => '2026-02-05',
                'ponente' => 'Ing. Torres',
                'descripcion' => 'Aplicaciones de AR/VR en educación, medicina y entretenimiento.',
            ],
        ];

        foreach ($conferencias as $conf) {
            Conferencia::create($conf);
        }
    }
}

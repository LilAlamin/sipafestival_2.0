<?php

namespace Database\Seeders;

use App\Models\Performer;
use Illuminate\Database\Seeder;

class PerformerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Performer::truncate();

        $performers = [
            // International Delegates
            [
                'name' => 'Khambatta Dance Company',
                'country' => 'United States of America',
                'country_badge' => 'USA',
                'category' => 'Contemporary Dance',
                'type' => 'international',
                'image_path' => 'delegates/Khambatta Dance Company.jpg',
                'is_featured_home' => true,
                'order' => 1,
            ],
            [
                'name' => 'PARRA.DICE',
                'country' => 'Netherlands',
                'country_badge' => 'NETHERLANDS',
                'category' => 'Contemporary Music',
                'type' => 'international',
                'image_path' => 'delegates/PARRA.DICE.jpg',
                'is_featured_home' => false,
                'order' => 2,
            ],
            [
                'name' => 'Sanggar Kirana',
                'country' => 'Malaysia',
                'country_badge' => 'MALAYSIA',
                'category' => 'Traditional Dance',
                'type' => 'international',
                'image_path' => 'delegates/Sanggar Kirana.jpg',
                'is_featured_home' => false,
                'order' => 3,
            ],
            [
                'name' => 'Seoul National University',
                'country' => 'South Korea',
                'country_badge' => 'SOUTH KOREA',
                'category' => 'Choir & Classical Music',
                'type' => 'international',
                'image_path' => 'delegates/SNU.jpg',
                'is_featured_home' => false,
                'order' => 4,
            ],
            [
                'name' => 'Colectivo Glovo',
                'country' => 'Spain',
                'country_badge' => 'SPAIN',
                'category' => 'Physical Theater',
                'type' => 'international',
                'image_path' => 'delegates/Colectivo Glovo.jpg',
                'is_featured_home' => true,
                'order' => 5,
            ],
            [
                'name' => 'Dongbaek Carnival',
                'country' => 'South Korea',
                'country_badge' => 'SOUTH KOREA',
                'category' => 'Carnival Dance',
                'type' => 'international',
                'image_path' => 'delegates/Dongbaek.jpg',
                'is_featured_home' => false,
                'order' => 6,
            ],
            [
                'name' => 'POD Dance Project',
                'country' => 'South Korea',
                'country_badge' => 'SOUTH KOREA',
                'category' => 'Modern Performing Arts',
                'type' => 'international',
                'image_path' => 'delegates/POD Dance.jpg',
                'is_featured_home' => true,
                'order' => 7,
            ],
            [
                'name' => 'Dr. Danny Tan & Fajar',
                'country' => 'Singapore x Indonesia',
                'country_badge' => 'SG x ID',
                'category' => 'Collaboration Dance',
                'type' => 'international',
                'image_path' => 'delegates/Kolaborasi SxI.png',
                'is_featured_home' => false,
                'order' => 8,
            ],

            // National Delegates
            [
                'name' => 'Rentak Gading Etnic',
                'country' => 'Bengkulu, Indonesia',
                'country_badge' => 'INDONESIA',
                'category' => 'Ethnic Music & Percussion',
                'type' => 'national',
                'image_path' => 'delegates/Rentak Gading Etcnic Bengkulu.jpg',
                'is_featured_home' => true,
                'order' => 9,
            ],
            [
                'name' => 'NoizeKilla',
                'country' => 'Bali',
                'country_badge' => 'BALI',
                'category' => 'Contemporary Beat & Music',
                'type' => 'national',
                'image_path' => 'delegates/Noizekilla.jpg',
                'is_featured_home' => false,
                'order' => 10,
            ],
            [
                'name' => 'Samohung',
                'country' => 'Trenggalek',
                'country_badge' => 'TRENGGALEK',
                'category' => 'Performing Arts',
                'type' => 'national',
                'image_path' => 'delegates/Samohung.png',
                'is_featured_home' => false,
                'order' => 11,
            ],
            [
                'name' => 'Sanggar Seni Lepas',
                'country' => 'Nusa Tenggara Barat',
                'country_badge' => 'NTB',
                'category' => 'Traditional Arts',
                'type' => 'national',
                'image_path' => 'delegates/Sanggar Seni Lepas.jpg',
                'is_featured_home' => false,
                'order' => 12,
            ],
            [
                'name' => 'Congwayndut',
                'country' => 'Karanganyar',
                'country_badge' => 'KARANGANYAR',
                'category' => 'Wayang & Kroncong Art',
                'type' => 'national',
                'image_path' => 'delegates/Congwayndut.png',
                'is_featured_home' => false,
                'order' => 13,
            ],
            [
                'name' => 'Darryl Simeon',
                'country' => 'Halmahera Barat',
                'country_badge' => 'HALMAHERA',
                'category' => 'Modern Ethnic Music',
                'type' => 'national',
                'image_path' => 'delegates/Darryl Simeon.JPG',
                'is_featured_home' => false,
                'order' => 14,
            ],
            [
                'name' => 'Duo Etnicholic',
                'country' => 'Malang',
                'country_badge' => 'MALANG',
                'category' => 'Ethnic Harmony Music',
                'type' => 'national',
                'image_path' => 'delegates/Duo Etnicholic.jpg',
                'is_featured_home' => false,
                'order' => 15,
            ],
            [
                'name' => 'Semarak Candrakirana',
                'country' => 'Solo',
                'country_badge' => 'SOLO',
                'category' => 'Center of Performing Arts',
                'type' => 'national',
                'image_path' => 'delegates/SCK1.png',
                'is_featured_home' => false,
                'order' => 16,
            ],
        ];

        foreach ($performers as $data) {
            Performer::create($data);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $yearsData = [
            2025 => [
                'theme_title' => 'Nifty, Artful, & Visionary',
                'location' => 'Maskot & Suasana 2025',
                'description' => 'Solo International Performing Arts (SIPA) 2025 hadir dengan semangat inovasi dan visi seni pertunjukan masa depan yang menyatukan para seniman global dalam panggung kolaboratif yang spektakuler.',
                'aftermovie_url' => 'https://www.youtube.com/embed/eOg3baFV5q8',
            ],
            2024 => [
                'theme_title' => 'Performing Royal Genesis',
                'location' => 'Pamedan Mangkunegaran',
                'description' => 'Solo International Performing Arts (SIPA) 2024 kembali digelar di Benteng Vastenburg, Solo, dengan mengangkat tema "Performing Royal Genesis". Diselenggarakan pada tanggal 5, 6, dan 7 September 2024, SIPA 2024 menghadirkan semangat generasi muda yang menjunjung tinggi keberagaman dan persatuan.',
                'aftermovie_url' => 'https://www.youtube.com/embed/eOg3baFV5q8',
            ],
            2023 => [
                'theme_title' => 'The Root of Equity',
                'location' => 'Benteng Vastenburg',
                'description' => 'Solo International Performing Arts (SIPA) 2023 kembali hadir di Benteng Vastenburg, Solo, sebagai ajang seni pertunjukan dunia yang mengangkat tema "The Root of Equity". Menyoroti pentingnya keadilan sosial dan kesetaraan melalui ekspresi seni.',
                'aftermovie_url' => 'https://www.youtube.com/embed/xMKSy58BxSU',
            ],
            2022 => [
                'theme_title' => 'Rise and Shine',
                'location' => 'Art & Cultural Revival',
                'description' => 'Solo International Performing Arts (SIPA) 2022 kembali digelar secara langsung di Benteng Vastenburg, Solo, membawa semangat kebangkitan setelah masa pandemi dengan menghadirkan pertunjukan seni dari dalam dan luar negeri.',
                'aftermovie_url' => 'https://www.youtube.com/embed/xmX_pDbEme8',
            ],
            2021 => [
                'theme_title' => 'Virtual Art for Global Harmony',
                'location' => 'Virtual & Hybrid Edition',
                'description' => 'Solo International Performing Arts (SIPA) 2021 kembali digelar secara daring di tengah suasana pandemi dengan format digital yang memungkinkan partisipasi global dan semangat persatuan lintas batas.',
                'aftermovie_url' => 'https://www.youtube.com/embed/4Kxxkm0OUbg',
            ],
            2020 => [
                'theme_title' => 'Digital SIPA: The Great Light of Art in The Pandemic Era',
                'location' => 'Digital Resilience Solo',
                'description' => 'Solo International Performing Arts (SIPA) 2020 tetap hadir di tengah tantangan global pandemi COVID-19 dengan format virtual, membuktikan ketangguhan seni dalam menghadapi krisis.',
                'aftermovie_url' => 'https://www.youtube.com/embed/RPeAFRCL_CM',
            ],
            2019 => [
                'theme_title' => 'We Are The World, We Are The Nation',
                'location' => '11th Annual Fest',
                'description' => 'Solo International Performing Arts (SIPA) 2019 kembali digelar di Benteng Vastenburg, Solo, sebagai ruang pertemuan budaya dunia memperkuat pesan kolaborasi lintas budaya dalam membangun dunia yang harmonis.',
                'aftermovie_url' => 'https://www.youtube.com/embed/RkL5rwEMn-E',
            ],
            2018 => [
                'theme_title' => 'We Are The World, We Are The Nation',
                'location' => 'Decade of Performing Arts',
                'description' => 'Solo International Performing Arts (SIPA) 2018 kembali hadir di Benteng Vastenburg, Solo, sebagai perayaan tahunan seni pertunjukan dunia yang menyatukan keberagaman budaya.',
                'aftermovie_url' => 'https://www.youtube.com/embed/MONLeXmh_HE',
            ],
            2017 => [
                'theme_title' => 'The World We Live In',
                'location' => 'Nusantara & Global Waves',
                'description' => 'Solo International Performing Arts (SIPA) 2017 kembali menghadirkan nuansa seni pertunjukan dunia di Benteng Vastenburg, Solo, mengajak penonton untuk merenungkan kondisi dunia saat ini melalui ekspresi seni.',
                'aftermovie_url' => 'https://www.youtube.com/embed/FhCwCmm-rkU',
            ],
            2016 => [
                'theme_title' => 'Mana Suka: This is All About Culture',
                'location' => 'Vastenburg Spectacular',
                'description' => 'Solo International Performing Arts (SIPA) 2016 kembali digelar di Benteng Vastenburg, Solo, menekankan keberagaman ekspresi budaya sebagai kekayaan yang patut dirayakan.',
                'aftermovie_url' => 'https://www.youtube.com/embed/jq95LQUVeNg',
            ],
            2015 => [
                'theme_title' => 'From Our Home Land to the World',
                'location' => 'Melodies of The World',
                'description' => 'Solo International Performing Arts (SIPA) 2015 hadir kembali di Benteng Vastenburg, Solo, menegaskan pentingnya melestarikan budaya lokal sebagai kekuatan untuk berkontribusi di kancah global.',
                'aftermovie_url' => 'https://www.youtube.com/embed/2iodFIZu_Hw',
            ],
            2014 => [
                'theme_title' => 'Let’s Make The World Better Through Art',
                'location' => 'International Heritage',
                'description' => 'Solo International Performing Arts (SIPA) 2014 kembali digelar di Benteng Vastenburg, Solo, menyerukan kekuatan seni dalam menciptakan perubahan positif dan membangun dunia yang lebih baik.',
                'aftermovie_url' => 'https://www.youtube.com/embed/IoKWW8DFPNE',
            ],
            2013 => [
                'theme_title' => 'Save Our Heritage for Better Future',
                'location' => 'Historical Fort Edition',
                'description' => 'Solo International Performing Arts (SIPA) 2013 merupakan perayaan tahunan seni pertunjukan dunia yang kembali digelar di Benteng Vastenburg, Solo, mengajak masyarakat melestarikan warisan budaya.',
                'aftermovie_url' => 'https://www.youtube.com/embed/VEzTltNsPzc',
            ],
            2012 => [
                'theme_title' => 'Go Green - save our world',
                'location' => 'Royal Pamedan Legacy',
                'description' => 'Solo International Performing Arts (SIPA) 2012 merupakan ajang tahunan yang menampilkan karya seni yang mengangkat kesadaran akan pentingnya pelestarian lingkungan dan keberlanjutan bumi.',
                'aftermovie_url' => 'https://www.youtube.com/embed/WoHFAlZ4wtA',
            ],
            2011 => [
                'theme_title' => 'Art is an Expression of Honesty Leads Life Toward Glory',
                'location' => 'Cultural Harmony',
                'description' => 'Solo International Performing Arts (SIPA) 2011 merupakan ajang tahunan yang merayakan keindahan seni pertunjukan sarat makna dan kejujuran artistik.',
                'aftermovie_url' => 'https://www.youtube.com/embed/OHRE8La8qZY',
            ],
            2010 => [
                'theme_title' => 'Nature Inspire the Soul of Art',
                'location' => 'The Global Stage',
                'description' => 'Solo International Performing Arts (SIPA) 2010 merupakan perhelatan seni tahunan yang memadukan keindahan budaya dengan refleksi harmonis antara alam dan seni.',
                'aftermovie_url' => 'https://www.youtube.com/embed/qFCZKc0cZjk',
            ],
            2009 => [
                'theme_title' => 'Art Brings Unity, Unity Brings Harmony',
                'location' => 'Inaugural SIPA Festival',
                'description' => 'Solo International Performing Arts (SIPA) 2009 merupakan ajang perdana yang merayakan keindahan seni pertunjukan dari berbagai penjuru dunia di Pamedan Pura Mangkunegaran.',
                'aftermovie_url' => 'https://www.youtube.com/embed/xuFt5LGa0qA',
            ],
        ];

        foreach ($yearsData as $year => $data) {
            // Scan photos directory
            $photoFiles = [];
            $yearDir = public_path("images/gallery/{$year}");
            if (File::exists($yearDir)) {
                $files = File::files($yearDir);
                foreach ($files as $file) {
                    $filename = $file->getFilename();
                    if (! str_starts_with($filename, '.')) {
                        $photoFiles[] = "gallery/{$year}/{$filename}";
                    }
                }
            }

            Gallery::updateOrCreate(
                ['year' => $year],
                [
                    'theme_title' => $data['theme_title'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'maskot_image' => "maskot/{$year}.webp",
                    'aftermovie_url' => $data['aftermovie_url'],
                    'photos' => $photoFiles,
                    'is_published' => true,
                    'order' => 2030 - $year,
                ]
            );
        }
    }
}

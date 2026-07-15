<?php

namespace Database\Seeders;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::insert([
            [
                'title' => 'SIPA 2025 Buka Kesempatan Relawan, Ajak Anak Muda Berkontribusi di Panggung Internasional',
                'description' => 'Solo International Performing Arts (SIPA) kembali membuka kesempatan bagi anak-anak muda yang antusias di dunia seni dan budaya untuk bergabung sebagai volunteer. Open Recruitment Volunteer SIPA 2025 dibuka mulai 1 hingga 9 Februari 2025.
                Festival tahunan berskala internasional ini menampilkan karya seni dari seniman lokal hingga mancanegara, yang akan digelar di Kota Solo, Jawa Tengah. Sejak pertama kali digelar pada tahun 2009, SIPA konsisten menjadi wadah pertunjukan seni lintas negara yang kaya akan keberagaman budaya.
                Bagi calon relawan yang memiliki semangat berkarya, suka membangun relasi, serta ingin menambah pengalaman dalam dunia pertunjukan, inilah saatnya untuk menjadi bagian dari SIPA Community. Informasi lebih lanjut dan pendaftaran dapat diakses melalui linktr.ee/volunteersipa25.
                            
                Salam Budaya!
                #SIPAFESTIVAL #SIPA2025 #16TahunBersamaSIPA',
                'image_path' => 'oprec_sipa_2025.png',
                'slug' => Str::slug('SIPA 2025 Buka Kesempatan Relawan, Ajak Anak Muda Berkontribusi di Panggung Internasional'),
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'Pembekalan Pertama Volunteer SIPA 2025: Kenali Dunia Event dan Asah Public Speaking ',
                'description' => 'Solo, 15 Maret 2025 – Setelah melalui proses open recruitment, para calon volunteer Solo International Performing Arts (SIPA) 2025 mengikuti Pembekalan Volunteer 1 yang digelar secara antusias dan penuh semangat. 
                Pembekalan ini menghadirkan dua narasumber utama: Aprizal Rizaldi Naim, S.H., yang membawakan materi Pengenalan SIPA dan Dunia Event, serta Retno Wulandari, S.H., M.Si., yang menyampaikan materi Public Speaking.
                Dalam sesi pertama, Aprizal memperkenalkan sejarah, visi, dan misi SIPA sebagai festival seni internasional yang berbasis di Solo, serta memberikan wawasan mendalam tentang bagaimana sebuah event besar diselenggarakan, mulai dari perencanaan hingga pelaksanaan.
                Sesi kedua dibawakan oleh Retno Wulandari dengan sangat interaktif. Ia membekali para volunteer dengan teknik-teknik dasar public speaking, membangun kepercayaan diri, serta tips komunikasi efektif yang sangat penting bagi relawan dalam menghadapi publik selama berlangsungnya festival.
                Kegiatan ini menjadi langkah awal yang penting untuk mempersiapkan para volunteer dalam menyambut gelaran SIPA 2025 yang penuh warna dan kolaborasi budaya. Melalui pembekalan ini, para peserta diharapkan tidak hanya siap secara teknis, tetapi juga membawa semangat kolaboratif dan profesionalisme dalam setiap kontribusi mereka.
                Salam Budaya!
                #SIPAFESTIVAL #SIPA2025 #16TahunBersamaSIPA',
                'image_path' => 'pembekalan_volunteer_1.JPG',
                'slug' => Str::slug('Pembekalan Pertama Volunteer SIPA 2025: Kenali Dunia Event dan Asah Public Speaking'),
                'created_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Pembekalan Kedua Volunteer SIPA 2025: Etika Komunikasi dan Wawasan Pariwisata Solo',
                'description' => 'Solo, 22 Maret 2025 – Rangkaian pelatihan untuk para relawan Solo International Performing Arts (SIPA) 2025 terus berlanjut. Bertempat di Dinas Pendidikan Kota Surakarta, Pembekalan Volunteer 2 digelar dengan menghadirkan dua narasumber yang kompeten di bidangnya.
                Materi pertama disampaikan oleh R. Ay. Febri Hapsari Dipokusumo, yang membahas secara mendalam mengenai Etika dan Komunikasi. Dalam sesinya, beliau menekankan pentingnya sikap profesional, sopan santun, serta cara berkomunikasi yang baik dalam menghadapi berbagai latar belakang pengunjung dan tamu internasional yang akan hadir di acara SIPA.
                Materi kedua dibawakan oleh Gembong Hadi Wibowo, P. Si., M. Si., dengan topik Pariwisata Kota Solo. Para volunteer diajak untuk mengenal lebih dekat kekayaan budaya, destinasi wisata, serta potensi lokal Solo sebagai kota budaya yang menjadi tuan rumah SIPA. Dengan pemahaman ini, para volunteer diharapkan mampu menjadi duta wisata yang informatif dan ramah bagi para tamu dari berbagai penjuru dunia.
                Kegiatan pembekalan ini menjadi bagian penting dalam menanamkan nilai-nilai hospitality dan kebanggaan terhadap kota Solo, serta membekali relawan dengan pengetahuan praktis yang dapat menunjang peran mereka dalam menyukseskan SIPA 2025.
                Salam Budaya!
                #SIPAFESTIVAL #SIPA2025 #16TahunBersamaSIPA',
                'image_path' => 'pembekalan_volunteer_2.JPG',
                'slug' => Str::slug('Pembekalan Kedua Volunteer SIPA 2025: Etika Komunikasi dan Wawasan Pariwisata Solo'),
                'created_at' => Carbon::now()->subDays(2),
            ],
        ]);

        // DB::table('news')->insert($news);
    }
}

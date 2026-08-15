<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Insert initial default settings
        DB::table('site_settings')->insertOrIgnore([
            [
                'key' => 'home_teaser_youtube_url',
                'value' => 'https://www.youtube.com/embed/zH0uYvN35sM',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'home_teaser_title',
                'value' => 'Solo International Performing Arts 2026 Official Teaser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

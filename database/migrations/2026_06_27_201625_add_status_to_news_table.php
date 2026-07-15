<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('status')->default('published')->after('image_path');
        });

        // Set status and sent_at for existing news items
        \Illuminate\Support\Facades\DB::table('news')
            ->where('title', 'like', '%Buka Kesempatan%')
            ->update([
                'status' => 'published',
                'sent_at' => now(),
            ]);

        \Illuminate\Support\Facades\DB::table('news')
            ->where('title', 'like', '%Pembekalan Pertama%')
            ->update([
                'status' => 'draft',
                'sent_at' => null,
            ]);

        \Illuminate\Support\Facades\DB::table('news')
            ->where('title', 'like', '%Pembekalan Kedua%')
            ->update([
                'status' => 'draft',
                'sent_at' => null,
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};

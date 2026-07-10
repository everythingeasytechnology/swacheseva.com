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
        Schema::table('services', function (Blueprint $table) {
            $table->integer('sort_order')->default(0)->after('is_featured');
        });

        // Backfill existing rows so current display order is preserved.
        $services = \App\Models\Service::orderBy('id')->get();
        foreach ($services as $index => $service) {
            $service->update(['sort_order' => $index + 1]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};

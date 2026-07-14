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
        Schema::table('users', function (Blueprint $table) {
            $table->string('physicall_handicap')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('shop_location')->nullable();
            $table->string('shop_location_2')->nullable();
            $table->text('house_address')->nullable();
            $table->string('country')->nullable();
            $table->string('alt_occuation_type')->nullable();
            $table->string('marketing_area')->nullable();
            $table->string('online_service')->nullable();
            $table->string('bank_account_type')->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->date('date_payment')->nullable();
            $table->string('service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'physicall_handicap',
                'year_of_passing',
                'institute_name',
                'shop_location',
                'shop_location_2',
                'house_address',
                'country',
                'alt_occuation_type',
                'marketing_area',
                'online_service',
                'bank_account_type',
                'fee',
                'date_payment',
                'service',
            ]);
        });
    }
};

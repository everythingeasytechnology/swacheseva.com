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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            
            // System and Role details
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->enum('status', ['pending', 'active', 'rejected'])->default('pending');
            $table->string('utr_code')->nullable();
            $table->string('payment_screenshot')->nullable();

            // Personal & Contact details
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('category')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('qualification')->nullable();

            // Address details
            $table->string('village')->nullable();
            $table->string('post_office')->nullable();
            $table->string('tehsil')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();

            // Shop / Centre details
            $table->string('shop_name')->nullable();
            $table->text('shop_address')->nullable();
            $table->string('shop_district')->nullable();
            $table->string('shop_state')->nullable();
            $table->string('shop_pincode')->nullable();

            // Bank details
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('holder_name')->nullable();

            // KYC details
            $table->string('aadhaar_no')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('security_pin')->nullable();

            // Document Upload paths
            $table->string('avatar')->nullable();
            $table->string('shop_photo')->nullable();
            $table->string('qualification_doc')->nullable();
            $table->string('aadhaar_front')->nullable();
            $table->string('aadhaar_back')->nullable();
            $table->string('pan_doc')->nullable();
            $table->string('passbook_doc')->nullable();
            
            // Decalaration state
            $table->boolean('declaration_signed')->default(false);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

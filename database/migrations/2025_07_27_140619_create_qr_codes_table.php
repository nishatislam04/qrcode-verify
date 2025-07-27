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
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();

            $table->uuid('code')->unique();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // User-provided warranty registration fields
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('registered_at')->nullable(); // warranty registration timestamp

            // Device fingerprint or IP bound field
            $table->string('fingerprint')->nullable(); // optional for additional anti-abuse

            $table->timestamp('scanned_at')->nullable(); // last scan
            $table->ipAddress('scanned_ip')->nullable(); // IP logging

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};

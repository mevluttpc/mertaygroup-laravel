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
            $table->enum('user_type', ['jobseeker', 'company'])->default('jobseeker')->after('email');
            $table->string('phone')->nullable()->after('user_type');
            $table->string('company_name')->nullable()->after('phone');
            $table->text('address')->nullable()->after('company_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_type', 'phone', 'company_name', 'address']);
        });
    }
};

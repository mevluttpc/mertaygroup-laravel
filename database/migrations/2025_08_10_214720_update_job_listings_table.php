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
        Schema::table('job_listings', function (Blueprint $table) {
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('slug')->nullable()->unique()->after('title');
            $table->date('deadline')->nullable();
            $table->integer('view_count')->default(0);
            $table->integer('application_count')->default(0);
            $table->json('benefits')->nullable(); // yan haklar
            $table->json('skills')->nullable(); // gerekli yetenekler
            $table->enum('work_type', ['office', 'remote', 'hybrid'])->default('office');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_urgent')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['category_id']);
            $table->dropColumn([
                'company_id', 'category_id', 'slug', 'deadline', 'view_count', 
                'application_count', 'benefits', 'skills', 'work_type', 
                'is_featured', 'is_urgent'
            ]);
        });
    }
};

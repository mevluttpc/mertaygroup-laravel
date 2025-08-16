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
            // İş arayan alanları
            $table->date('birth_date')->nullable()->after('address');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('birth_date');
            $table->string('education_level')->nullable()->after('gender');
            $table->string('university')->nullable()->after('education_level');
            $table->string('department')->nullable()->after('university');
            $table->year('graduation_year')->nullable()->after('department');
            $table->text('skills')->nullable()->after('graduation_year');
            $table->text('experience')->nullable()->after('skills');
            $table->string('linkedin_url')->nullable()->after('experience');
            $table->string('portfolio_url')->nullable()->after('linkedin_url');
            $table->text('bio')->nullable()->after('portfolio_url');
            
            // Firma alanları
            $table->string('tax_number')->nullable()->after('bio');
            $table->string('sector')->nullable()->after('tax_number');
            $table->integer('employee_count')->nullable()->after('sector');
            $table->year('founded_year')->nullable()->after('employee_count');
            $table->string('website')->nullable()->after('founded_year');
            $table->text('company_description')->nullable()->after('website');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'birth_date', 'gender', 'education_level', 'university', 'department', 
                'graduation_year', 'skills', 'experience', 'linkedin_url', 'portfolio_url', 
                'bio', 'tax_number', 'sector', 'employee_count', 'founded_year', 
                'website', 'company_description'
            ]);
        });
    }
};

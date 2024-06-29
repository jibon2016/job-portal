<?php

use App\Models\Employer;
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
        Schema::create('ks_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employer::class);
            $table->string('job_title');
            $table->string('company_name');
            $table->text('summary')->nullable();
            $table->text('description');
            $table->text('requirement');
            $table->timestamp('deadline');
            $table->integer('vacancy');
            $table->string('location');
            $table->float('exp_min')->nullable();
            $table->float('exp_max')->nullable();
            $table->enum('exp_type', ['month', 'year']);
            $table->string('industry_type')->nullable();
            $table->string('employment_type')->default('Full Time');
            $table->string('company_image');
            $table->string('role')->nullable();
            $table->boolean('featured')->default(false);
            $table->string('salary_min')->nullable();
            $table->string('salary_max')->nullable();
            $table->string('salary_type')->nullable();
            $table->string('key_skills')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ks_jobs');
    }
};

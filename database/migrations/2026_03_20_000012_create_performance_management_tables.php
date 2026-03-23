<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // KPI Categories
        Schema::create('kpi_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('color', 20)->default('#3B82F6'); // Tailwind blue
            $table->timestamps();
        });

        // KPIs (individual metrics)
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kpi_category_id')->constrained('kpi_categories')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('weight')->default(10); // 1-100 weight %
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Evaluation periods
        Schema::create('employee_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('evaluator_id')->constrained('users')->cascadeOnDelete();
            $table->enum('period_type', ['monthly', 'quarterly', 'yearly']);
            $table->date('period_start');
            $table->date('period_end');
            $table->decimal('total_score', 5, 2)->nullable(); // 0-100
            $table->text('remarks')->nullable();
            $table->enum('status', ['draft', 'submitted', 'approved'])->default('draft');
            $table->timestamps();

            $table->index(['company_id', 'employee_id', 'period_start']);
        });

        // Individual KPI scores per evaluation
        Schema::create('evaluation_scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_evaluation_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kpi_id')->constrained()->cascadeOnDelete();
            $table->decimal('score', 5, 2); // 0-100
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluation_scores');
        Schema::dropIfExists('employee_evaluations');
        Schema::dropIfExists('kpis');
        Schema::dropIfExists('kpi_categories');
    }
};

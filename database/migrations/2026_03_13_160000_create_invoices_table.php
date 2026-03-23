<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscription_plan_id')->constrained()->cascadeOnDelete();
            $table->string('company_name');
            $table->string('contact')->nullable();
            $table->string('plan_name');
            $table->string('billing_cycle')->default('monthly');
            $table->integer('months')->default(1);
            $table->decimal('amount', 10, 2);
            $table->date('paid_at');
            $table->date('valid_until');
            $table->string('payment_method')->default('KHQR');
            $table->string('status')->default('paid'); // paid, cancelled
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

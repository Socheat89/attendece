<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'company_id',
        'subscription_plan_id',
        'company_name',
        'contact',
        'plan_name',
        'billing_cycle',
        'months',
        'amount',
        'paid_at',
        'valid_until',
        'payment_method',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'amount'      => 'decimal:2',
            'paid_at'     => 'date',
            'valid_until' => 'date',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function subscriptionPlan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    /**
     * Generate next unique invoice number like INV-2026-00001
     */
    public static function generateNumber(): string
    {
        $year  = now()->year;
        $last  = static::whereYear('created_at', $year)->max('id') ?? 0;
        $seq   = str_pad($last + 1, 5, '0', STR_PAD_LEFT);
        return "INV-{$year}-{$seq}";
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'subscription_plan_id',
        'method',
        'status',
        'access_token',
        'months',
        'amount'
    ];
}

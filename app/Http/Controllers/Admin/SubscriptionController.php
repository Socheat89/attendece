<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\SubscriptionPlan;

class SubscriptionController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->company_id;
        $currentCompany = auth()->user()->company->load('subscriptionPlan');

        $plans = SubscriptionPlan::query()->where('is_active', true)->orderBy('price')->get();

        // Stats for the current company
        $monthlySpending = $currentCompany->monthly_price;
        $isSubscriptionActive = $currentCompany->status === 'active';
        $isSubscriptionExpired = $currentCompany->status === 'expired';

        // Paid invoices for the current company only
        $invoices = Invoice::query()
            ->with('subscriptionPlan')
            ->where('company_id', $companyId)
            ->where('status', 'paid')
            ->latest()
            ->paginate(15, ['*'], 'invoice_page');

        $totalSpent = Invoice::where('company_id', $companyId)->where('status', 'paid')->sum('amount');

        return view('admin.subscription.index', compact(
            'plans',
            'currentCompany',
            'monthlySpending',
            'isSubscriptionActive',
            'isSubscriptionExpired',
            'invoices',
            'totalSpent',
        ));
    }
}

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
        $plans = SubscriptionPlan::query()->where('is_active', true)->orderBy('price')->get();
        $companies = Company::query()->with('subscriptionPlan')->latest()->paginate(15);

        $monthlyIncome = Company::query()->where('status', 'active')->sum('monthly_price');
        $activeSubscriptions = Company::query()->where('status', 'active')->count();
        $expiredCompanies = Company::query()->where('status', 'expired')->count();

        // Paid invoices for Subscription Invoice section
        $invoices = Invoice::query()
            ->with('subscriptionPlan')
            ->where('status', 'paid')
            ->latest()
            ->paginate(15, ['*'], 'invoice_page');

        $totalRevenue = Invoice::where('status', 'paid')->sum('amount');

        return view('admin.subscription.index', compact(
            'plans',
            'companies',
            'monthlyIncome',
            'activeSubscriptions',
            'expiredCompanies',
            'invoices',
            'totalRevenue',
        ));
    }
}

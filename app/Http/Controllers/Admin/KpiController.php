<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kpi;
use App\Models\KpiCategory;
use Illuminate\Http\Request;

class KpiController extends Controller
{
    public function index()
    {
        $categories = KpiCategory::with(['kpis' => fn($q) => $q->orderBy('name')])
            ->where('company_id', auth()->user()->company_id)
            ->orderBy('name')
            ->get();

        return view('admin.performance.kpi.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:100'],
            'color' => ['nullable', 'string', 'max:20'],
        ]);

        KpiCategory::create([
            'company_id' => auth()->user()->company_id,
            'name'       => $request->name,
            'color'      => $request->color ?? '#3B82F6',
        ]);

        return back()->with('success', 'KPI Category created.');
    }

    public function storeKpi(Request $request)
    {
        $request->validate([
            'kpi_category_id' => ['required', 'exists:kpi_categories,id'],
            'name'            => ['required', 'string', 'max:150'],
            'description'     => ['nullable', 'string'],
            'weight'          => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        Kpi::create([
            'company_id'      => auth()->user()->company_id,
            'kpi_category_id' => $request->kpi_category_id,
            'name'            => $request->name,
            'description'     => $request->description,
            'weight'          => $request->weight,
        ]);

        return back()->with('success', 'KPI added.');
    }

    public function destroyKpi(Kpi $kpi)
    {
        abort_if($kpi->company_id !== auth()->user()->company_id, 403);
        $kpi->delete();
        return back()->with('success', 'KPI deleted.');
    }

    public function destroyCategory(KpiCategory $kpiCategory)
    {
        abort_if($kpiCategory->company_id !== auth()->user()->company_id, 403);
        $kpiCategory->delete();
        return back()->with('success', 'Category deleted.');
    }

    public function toggleKpi(Kpi $kpi)
    {
        abort_if($kpi->company_id !== auth()->user()->company_id, 403);
        $kpi->update(['is_active' => ! $kpi->is_active]);
        return back()->with('success', 'KPI status updated.');
    }
}

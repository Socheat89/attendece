<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeEvaluation;
use App\Models\EvaluationScore;
use App\Models\Kpi;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index(Request $request)
    {
        $query = EmployeeEvaluation::with(['employee.user', 'evaluator'])
            ->where('company_id', auth()->user()->company_id)
            ->latest('period_start');

        if ($request->filled('period_type')) {
            $query->where('period_type', $request->period_type);
        }
        if ($request->filled('employee_id')) {
            $query->where('employee_id', $request->employee_id);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $evaluations = $query->paginate(20)->withQueryString();
        $employees = Employee::with('user')
            ->where('company_id', auth()->user()->company_id)
            ->orderBy('name')
            ->get();

        return view('admin.performance.evaluations.index', compact('evaluations', 'employees'));
    }

    public function create()
    {
        $employees = Employee::with('user')
            ->where('company_id', auth()->user()->company_id)
            ->orderBy('name')
            ->get();

        $kpis = Kpi::with('category')
            ->where('company_id', auth()->user()->company_id)
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.performance.evaluations.create', compact('employees', 'kpis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'  => ['required', 'exists:employees,id'],
            'period_type'  => ['required', 'in:monthly,quarterly,yearly'],
            'period_start' => ['required', 'date'],
            'period_end'   => ['required', 'date', 'after:period_start'],
            'remarks'      => ['nullable', 'string'],
            'scores'       => ['required', 'array'],
            'scores.*'     => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $evaluation = EmployeeEvaluation::create([
            'company_id'   => auth()->user()->company_id,
            'employee_id'  => $request->employee_id,
            'evaluator_id' => auth()->id(),
            'period_type'  => $request->period_type,
            'period_start' => $request->period_start,
            'period_end'   => $request->period_end,
            'remarks'      => $request->remarks,
            'status'       => 'draft',
        ]);

        $totalWeight = 0;
        $weightedSum = 0;

        foreach ($request->scores as $kpiId => $score) {
            $kpi = Kpi::find($kpiId);
            if (! $kpi) continue;

            EvaluationScore::create([
                'employee_evaluation_id' => $evaluation->id,
                'kpi_id'   => $kpiId,
                'score'    => $score,
                'note'     => $request->notes[$kpiId] ?? null,
            ]);

            $totalWeight += $kpi->weight;
            $weightedSum += $score * $kpi->weight;
        }

        $totalScore = $totalWeight > 0 ? round($weightedSum / $totalWeight, 2) : 0;
        $evaluation->update(['total_score' => $totalScore]);

        return redirect()->route('admin.evaluations.index')
            ->with('success', "Evaluation created. Total Score: {$totalScore}/100");
    }

    public function show(EmployeeEvaluation $evaluation)
    {
        abort_if($evaluation->company_id !== auth()->user()->company_id, 403);
        $evaluation->load(['employee.user', 'evaluator', 'scores.kpi.category']);
        return view('admin.performance.evaluations.show', compact('evaluation'));
    }

    public function approve(EmployeeEvaluation $evaluation)
    {
        abort_if($evaluation->company_id !== auth()->user()->company_id, 403);
        $evaluation->update(['status' => 'approved']);
        return back()->with('success', 'Evaluation approved.');
    }

    public function destroy(EmployeeEvaluation $evaluation)
    {
        abort_if($evaluation->company_id !== auth()->user()->company_id, 403);
        $evaluation->delete();
        return redirect()->route('admin.evaluations.index')->with('success', 'Evaluation deleted.');
    }
}

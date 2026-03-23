<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveMapController extends Controller
{
    public function index()
    {
        return view('admin.live-map.index');
    }

    public function data(\Illuminate\Http\Request $request)
    {
        // Get the latest location for each employee for today
        $locations = \App\Models\EmployeeLocation::with(['employee.user'])
            ->whereDate('tracked_at', \Carbon\Carbon::today())
            ->whereIn('id', function($query) {
                $query->selectRaw('MAX(id)')
                    ->from('employee_locations')
                    ->whereDate('tracked_at', \Carbon\Carbon::today())
                    ->groupBy('employee_id');
            })
            ->get();

        return response()->json($locations);
    }
}

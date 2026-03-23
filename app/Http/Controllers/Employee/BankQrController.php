<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankQrController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'bank_qr_image' => ['required', 'image', 'max:4096'],
        ]);

        $employee = auth()->user()->employee;

        if (! $employee) {
            abort(404);
        }

        // Remove old QR if exists
        if ($employee->bank_qr_path) {
            Storage::disk('public')->delete($employee->bank_qr_path);
        }

        $path = $request->file('bank_qr_image')->store('bank-qr', 'public');
        $employee->update(['bank_qr_path' => $path]);

        return back()->with('status', __('Bank QR updated successfully.'));
    }

    public function destroy()
    {
        $employee = auth()->user()->employee;

        if (! $employee) {
            abort(404);
        }

        if ($employee->bank_qr_path) {
            Storage::disk('public')->delete($employee->bank_qr_path);
            $employee->update(['bank_qr_path' => null]);
        }

        return back()->with('status', __('Bank QR removed.'));
    }
}

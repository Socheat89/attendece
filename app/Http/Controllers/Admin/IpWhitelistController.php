<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IpWhitelist;
use Illuminate\Http\Request;

class IpWhitelistController extends Controller
{
    public function index()
    {
        $ips = IpWhitelist::where('company_id', auth()->user()->company_id)
            ->orderBy('created_at', 'desc')
            ->get();

        $currentIp = request()->ip();

        return view('admin.security.ip-whitelist', compact('ips', 'currentIp'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => ['required', 'string', 'max:45'],
            'label'      => ['nullable', 'string', 'max:100'],
        ]);

        IpWhitelist::create([
            'company_id' => auth()->user()->company_id,
            'ip_address' => $request->ip_address,
            'label'      => $request->label,
            'is_active'  => true,
        ]);

        return back()->with('success', 'IP address added to whitelist.');
    }

    public function toggle(IpWhitelist $ipWhitelist)
    {
        $this->authorize_company($ipWhitelist);
        $ipWhitelist->update(['is_active' => ! $ipWhitelist->is_active]);

        return back()->with('success', 'IP status updated.');
    }

    public function destroy(IpWhitelist $ipWhitelist)
    {
        $this->authorize_company($ipWhitelist);
        $ipWhitelist->delete();

        return back()->with('success', 'IP address removed.');
    }

    private function authorize_company(IpWhitelist $ip): void
    {
        abort_if($ip->company_id !== auth()->user()->company_id, 403);
    }
}

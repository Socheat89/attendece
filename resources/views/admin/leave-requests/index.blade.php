<x-layouts.admin>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">{{ __('Leave Requests') }}</h2>
            <p class="text-sm text-slate-500 mt-1">{{ __('Review and manage employee leave requests.') }}</p>
        </div>
        <form method="GET" class="flex gap-2 w-full md:w-auto">
            <select name="status" class="border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm py-2 px-3 pl-3 pr-10">
                <option value="">{{ __('All Statuses') }}</option>
                <option value="pending" @selected(request('status')==='pending')>{{ __('Pending') }}</option>
                <option value="approved" @selected(request('status')==='approved')>{{ __('Approved') }}</option>
                <option value="rejected" @selected(request('status')==='rejected')>{{ __('Rejected') }}</option>
            </select>
            <button class="bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">{{ __('Filter') }}</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 mb-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                        <th class="py-3 px-4">{{ __('Employee') }}</th>
                        <th class="py-3 px-4">{{ __('Leave Type') }}</th>
                        <th class="py-3 px-4">{{ __('Date') }}</th>
                        <th class="py-3 px-4 max-w-xs">{{ __('Reason') }}</th>
                        <th class="py-3 px-4">{{ __('Status') }}</th>
                        <th class="py-3 px-4 text-right">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($leaveRequests as $request)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="font-medium text-slate-800">{{ $request->employee->user->name }}</div>
                            </td>
                            <td class="py-3 px-4 text-sm text-slate-600">{{ $request->leaveType->name }}</td>
                            <td class="py-3 px-4 text-sm text-slate-600 whitespace-nowrap">{{ $request->start_date->toDateString() }} <span class="text-slate-400 mx-1">→</span> {{ $request->end_date->toDateString() }}</td>
                            <td class="py-3 px-4 text-sm text-slate-600 truncate max-w-[220px]" title="{{ $request->reason ?? '' }}">
                                {{ $request->reason ?? '-' }}
                            </td>
                            <td class="py-3 px-4">
                                @php
                                    $badgeClass = match($request->status) {
                                        'approved' => 'bg-emerald-100 text-emerald-800',
                                        'rejected' => 'bg-red-100 text-red-800',
                                        default => 'bg-orange-100 text-orange-800'
                                    };
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $badgeClass }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                                @if($request->admin_comment)
                                    <div class="mt-1">
                                        <small class="text-xs text-slate-500 line-clamp-1" title="{{ $request->admin_comment }}">{{ $request->admin_comment }}</small>
                                    </div>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                @if($request->status === 'pending')
                                    <form method="POST" action="{{ route('admin.leave-requests.status', $request) }}" class="inline-block mr-1">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button class="inline-flex items-center justify-center text-sm font-medium text-emerald-600 hover:text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-1.5 rounded-md transition-colors">
                                            {{ __('Approve') }}
                                        </button>
                                    </form>
                                    <button 
                                        x-data=""
                                        x-on:click="$dispatch('open-modal', 'rejectModal'); $dispatch('set-reject-id', '{{ $request->id }}')"
                                        class="inline-flex items-center justify-center text-sm font-medium text-red-600 hover:text-red-700 bg-white border border-red-200 hover:bg-red-50 px-3 py-1.5 rounded-md transition-colors ml-1">
                                        {{ __('Reject') }}
                                    </button>
                                @else
                                    <span class="text-xs text-slate-400">{{ __('Processed') }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-8 text-center text-slate-500">{{ __('No leave requests found.') }}</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if(method_exists($leaveRequests, 'links'))
        <div class="p-4 border-t border-slate-200">
            {{ $leaveRequests->links() }}
        </div>
        @endif
    </div>

    <!-- Reject Modal -->
    <div x-data="{ 
            open: false,
            requestId: null,
            baseRoute: '{{ route('admin.leave-requests.status', '__id__') }}'
         }" 
         x-on:open-modal.window="if ($event.detail === 'rejectModal') open = true"
         x-on:set-reject-id.window="requestId = $event.detail"
         x-show="open" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;"
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
        
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
            
            <div x-show="open" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-slate-900 bg-opacity-50 transition-opacity" 
                 aria-hidden="true" 
                 x-on:click="open = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div x-show="open" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                 class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-slate-200">
                
                <form method="POST" :action="requestId ? baseRoute.replace('__id__', requestId) : '#'">
                    @csrf @method('PATCH')
                    <input type="hidden" name="status" value="rejected">
                    
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
                            <h3 class="text-lg leading-6 font-semibold text-slate-800" id="modal-title">{{ __('Reject Leave Request') }}</h3>
                            <button type="button" x-on:click="open = false" class="text-slate-400 hover:text-slate-500 transition-colors">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </div>
                        
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-slate-700 mb-2">{{ __('Rejection Comment') }}</label>
                            <textarea name="admin_comment" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-red-500 focus:ring focus:ring-red-500 focus:ring-opacity-50 text-sm" rows="3" required placeholder="{{ __('Please provide a reason for rejecting this leave request...') }}"></textarea>
                        </div>
                    </div>
                    
                    <div class="bg-slate-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-slate-200 gap-2">
                        <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm transition-colors mb-2 sm:mb-0">
                            {{ __('Reject') }}
                        </button>
                        <button type="button" x-on:click="open = false" class="w-full inline-flex justify-center rounded-lg border border-slate-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 sm:w-auto sm:text-sm transition-colors">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>

<x-layouts.admin>
    <div class="space-y-8">
        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">🔔 {{ __('Notifications') }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ __('All your system notifications') }}</p>
            </div>
            @if(auth()->user()->unreadNotifications->count() > 0)
                <form method="POST" action="{{ route('admin.notifications.read-all') }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-blue-600 rounded-xl border border-blue-200 bg-blue-50 hover:bg-blue-100 transition">
                        <i class="fa-solid fa-check-double"></i> {{ __('Mark All as Read') }}
                    </button>
                </form>
            @endif
        </div>

        {{-- Notifications List --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            @forelse($notifications as $notif)
                <div class="flex items-start gap-4 px-6 py-5 border-b border-slate-50 last:border-0 hover:bg-slate-50 transition {{ $notif->read_at ? 'opacity-60' : '' }}">
                    {{-- Icon --}}
                    <div class="flex-shrink-0 w-11 h-11 rounded-xl {{ $notif->data['color'] ?? 'bg-blue-100 text-blue-600' }} flex items-center justify-center text-xl shadow-sm">
                        <i class="{{ $notif->data['icon'] ?? 'fa-solid fa-bell' }}"></i>
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-bold text-slate-800">{{ $notif->data['title'] ?? 'Notification' }}</p>
                                <p class="text-sm text-slate-500 mt-0.5 leading-relaxed">{{ $notif->data['message'] ?? '' }}</p>
                                <p class="text-xs text-slate-400 mt-2 font-medium">{{ $notif->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                @if(!$notif->read_at)
                                    <span class="inline-block w-2.5 h-2.5 rounded-full bg-blue-500 shadow shadow-blue-300"></span>
                                    <form method="POST" action="{{ route('admin.notifications.read', $notif->id) }}">
                                        @csrf
                                        <button type="submit" class="text-xs text-blue-600 hover:underline font-medium">{{ __('Mark Read') }}</button>
                                    </form>
                                @endif
                                <form method="POST" action="{{ route('admin.notifications.destroy', $notif->id) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs text-red-400 hover:text-red-600 transition">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-regular fa-bell-slash text-3xl text-slate-400"></i>
                    </div>
                    <p class="text-base font-bold text-slate-700">{{ __('All caught up!') }}</p>
                    <p class="text-sm text-slate-400 mt-1">{{ __('No notifications to show.') }}</p>
                </div>
            @endforelse
        </div>

        {{ $notifications->links() }}
    </div>
</x-layouts.admin>

<x-layouts.admin>
    <div class="space-y-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">💾 {{ __('Database Backup') }}</h1>
                <p class="text-sm text-slate-500 mt-1">{{ __('Create, download, and manage database backups.') }}</p>
            </div>
            <form method="POST" action="{{ route('admin.security.backup.create') }}">
                @csrf
                <button type="submit"
                    onclick="return confirm('Create a new database backup now?')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-bold shadow-md shadow-blue-200 hover:shadow-blue-300 hover:-translate-y-0.5 transition-all">
                    <i class="fa-solid fa-database"></i> {{ __('Backup Now') }}
                </button>
            </form>
        </div>

        {{-- Info banner --}}
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-4 flex items-start gap-3">
            <i class="fa-solid fa-circle-info text-amber-500 mt-0.5"></i>
            <div class="text-sm text-amber-800">
                <strong>{{ __('Auto Backup') }}:</strong> {{ __('Backups run automatically every day at 2:00 AM. You can also trigger manually above.') }}
            </div>
        </div>

        {{-- Backup list --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100">
                <h3 class="font-bold text-slate-800">{{ __('Backup Files') }}</h3>
            </div>
            @forelse($backups as $backup)
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-50 last:border-0 hover:bg-slate-50 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center">
                            <i class="fa-solid fa-file-zipper text-blue-600 text-lg"></i>
                        </div>
                        <div>
                            <p class="font-mono text-sm font-semibold text-slate-800 truncate max-w-sm">{{ $backup['name'] }}</p>
                            <div class="flex items-center gap-3 mt-0.5">
                                <span class="text-xs text-slate-400">{{ $backup['size'] }}</span>
                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                <span class="text-xs text-slate-400">{{ $backup['modified']->format('d M Y H:i') }}</span>
                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                <span class="text-xs text-slate-400">{{ $backup['modified']->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.security.backup.download', ['file' => $backup['name']]) }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                            <i class="fa-solid fa-download"></i> {{ __('Download') }}
                        </a>
                        <form method="POST" action="{{ route('admin.security.backup.destroy', ['file' => $backup['name']]) }}">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this backup?')"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-red-500 bg-red-50 rounded-lg hover:bg-red-100 transition">
                                <i class="fa-solid fa-trash"></i> {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-database text-3xl text-slate-400"></i>
                    </div>
                    <p class="font-bold text-slate-700">{{ __('No backups yet') }}</p>
                    <p class="text-sm text-slate-400 mt-1">{{ __('Click "Backup Now" to create your first backup.') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.admin>

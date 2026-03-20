<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        $backups = [];
        $disk = Storage::disk('local');

        if ($disk->exists('backups')) {
            $files = $disk->files('backups');
            foreach ($files as $file) {
                $backups[] = [
                    'name'     => basename($file),
                    'path'     => $file,
                    'size'     => $this->formatBytes($disk->size($file)),
                    'modified' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($file)),
                ];
            }
            // Newest first
            usort($backups, fn ($a, $b) => $b['modified'] <=> $a['modified']);
        }

        return view('admin.security.backup', compact('backups'));
    }

    public function create()
    {
        try {
            Artisan::call('backup:run', ['--only-db' => true]);
            return back()->with('success', 'Database backup created successfully! 🎉');
        } catch (\Exception $e) {
            return back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function download(Request $request)
    {
        $filename = $request->query('file');
        $path = 'backups/' . $filename;

        if (! Storage::disk('local')->exists($path)) {
            abort(404, 'Backup file not found.');
        }

        return Storage::disk('local')->download($path, $filename);
    }

    public function destroy(Request $request)
    {
        $filename = $request->query('file');
        $path = 'backups/' . $filename;

        if (Storage::disk('local')->exists($path)) {
            Storage::disk('local')->delete($path);
        }

        return back()->with('success', 'Backup deleted.');
    }

    private function formatBytes(int $bytes): string
    {
        if ($bytes >= 1073741824) return round($bytes / 1073741824, 2) . ' GB';
        if ($bytes >= 1048576)    return round($bytes / 1048576, 2) . ' MB';
        if ($bytes >= 1024)       return round($bytes / 1024, 2) . ' KB';
        return $bytes . ' B';
    }
}

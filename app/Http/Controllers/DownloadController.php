<?php

namespace App\Http\Controllers;

use App\Models\AppRelease;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Page de téléchargement (nécessite authentification)
     */
    public function index()
    {
        // Récupérer la dernière release active
        $latestRelease = AppRelease::where('is_active', true)
            ->where('platform', 'windows')
            ->orderBy('created_at', 'desc')
            ->first();

        return view('pages.download', compact('latestRelease'));
    }

    /**
     * Télécharger le fichier MSI
     */
    public function downloadMsi()
    {
        $release = AppRelease::where('is_active', true)
            ->where('platform', 'windows')
            ->where('file_name', 'like', '%.msi')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$release) {
            return back()->with('error', 'Fichier non disponible pour le moment.');
        }

        $filePath = public_path('downloads/' . $release->file_name);

        if (!file_exists($filePath)) {
            return back()->with('error', 'Fichier non disponible pour le moment.');
        }

        return response()->download($filePath);
    }

    /**
     * Télécharger le fichier EXE
     */
    public function downloadExe()
    {
        $release = AppRelease::where('is_active', true)
            ->where('platform', 'windows')
            ->where('file_name', 'like', '%.exe')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$release) {
            return back()->with('error', 'Fichier non disponible pour le moment.');
        }

        $filePath = public_path('downloads/' . $release->file_name);

        if (!file_exists($filePath)) {
            return back()->with('error', 'Fichier non disponible pour le moment.');
        }

        return response()->download($filePath);
    }
}

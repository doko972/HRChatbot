<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReleaseController extends Controller
{
    /**
     * Affiche la liste des releases
     */
    public function index()
    {
        $releases = AppRelease::orderBy('created_at', 'desc')->get();
        return view('admin.releases.index', compact('releases'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('admin.releases.create');
    }

    /**
     * Enregistre une nouvelle release
     */
    public function store(Request $request)
    {
        $request->validate([
            'version' => 'required|string|max:20',
            'platform' => 'required|string|in:windows,macos,linux',
            'changelog' => 'required|string',
            'file' => 'required|file|max:512000', // 500 Mo max
            'is_mandatory' => 'boolean',
        ]);

        // Récupérer l'extension du fichier
        $extension = $request->file('file')->getClientOriginalExtension();

        // Vérifier que cette version n'existe pas déjà pour cette plateforme ET ce type de fichier
        $exists = AppRelease::where('version', $request->version)
            ->where('platform', $request->platform)
            ->where('file_name', 'like', '%.' . $extension)
            ->exists();

        if ($exists) {
            return back()->withErrors(['version' => 'Cette version existe déjà pour cette plateforme avec ce type de fichier.']);
        }

        // Upload du fichier
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('releases', $fileName);

        // Créer la release
        AppRelease::create([
            'version' => $request->version,
            'platform' => $request->platform,
            'changelog' => $request->changelog,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $file->getSize(),
            'is_active' => true,
            'is_mandatory' => $request->boolean('is_mandatory'),
        ]);

        return redirect()->route('admin.releases.index')
            ->with('success', 'Release ajoutée avec succès !');
    }

    /**
     * Supprime une release
     */
    public function destroy(AppRelease $release)
    {
        // Supprimer le fichier
        Storage::delete($release->file_path);

        // Supprimer l'entrée
        $release->delete();

        return redirect()->route('admin.releases.index')
            ->with('success', 'Release supprimée !');
    }

    /**
     * Active/Désactive une release
     */
    public function toggle(AppRelease $release)
    {
        $release->update(['is_active' => !$release->is_active]);

        $status = $release->is_active ? 'activée' : 'désactivée';
        return redirect()->route('admin.releases.index')
            ->with('success', "Release {$status} !");
    }
}
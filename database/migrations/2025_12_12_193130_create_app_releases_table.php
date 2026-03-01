<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('app_releases', function (Blueprint $table) {
            $table->id();
            $table->string('version');          // Ex: "1.0.1"
            $table->string('platform');         // "windows", "macos", "linux"
            $table->text('changelog');          // Notes de mise à jour
            $table->string('file_path');        // Chemin vers le fichier d'installation
            $table->string('file_name');        // Nom du fichier original
            $table->unsignedBigInteger('file_size'); // Taille en bytes
            $table->string('signature')->nullable(); // Signature pour vérification
            $table->boolean('is_active')->default(true); // Version disponible ?
            $table->boolean('is_mandatory')->default(false); // Mise à jour obligatoire ?
            $table->timestamps();
            
            $table->unique(['version', 'platform']); // Une version par plateforme
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('app_releases');
    }
};
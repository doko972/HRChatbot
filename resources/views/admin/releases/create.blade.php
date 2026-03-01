<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Release - HR Chatbot Admin</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="layout-admin">
    <div class="container">
        <a href="{{ route('admin.releases.index') }}" class="back-link">← Retour à la liste</a>

        <h1>Nouvelle Release</h1>

        @if($errors->any())
            <div class="alert-error">
                <ul style="margin-left: 1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('admin.releases.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="version">Version</label>
                    <input type="text" id="version" name="version" value="{{ old('version') }}" placeholder="Ex: 1.0.1" required>
                </div>

                <div class="form-group">
                    <label for="platform">Plateforme</label>
                    <select id="platform" name="platform" required>
                        <option value="windows" {{ old('platform') == 'windows' ? 'selected' : '' }}>Windows</option>
                        <option value="macos" {{ old('platform') == 'macos' ? 'selected' : '' }}>macOS</option>
                        <option value="linux" {{ old('platform') == 'linux' ? 'selected' : '' }}>Linux</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="changelog">Notes de mise à jour</label>
                    <textarea id="changelog" name="changelog" placeholder="Décrivez les changements de cette version..." required>{{ old('changelog') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Fichier d'installation</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="file" name="file" accept=".exe,.msi,.dmg,.deb,.AppImage" required>
                        <div class="file-input-text">
                            <span>Cliquez pour sélectionner</span> ou glissez-déposez<br>
                            .exe, .msi, .dmg, .deb, .AppImage
                        </div>
                        <div class="file-name" id="fileName"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="is_mandatory" name="is_mandatory" value="1" {{ old('is_mandatory') ? 'checked' : '' }}>
                        <label for="is_mandatory">Mise à jour obligatoire</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Publier la release</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || '';
            document.getElementById('fileName').textContent = fileName;
        });
    </script>
</body>
</html>
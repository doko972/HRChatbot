<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Releases - HR Chatbot Admin</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="layout-admin">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="back-link">← Retour au dashboard</a>

        <div class="header">
            <h1>Gestion des Releases</h1>
            <a href="{{ route('admin.releases.create') }}" class="btn btn-primary">
                + Nouvelle Release
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            @if($releases->count() > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Version</th>
                            <th>Plateforme</th>
                            <th>Fichier</th>
                            <th>Statut</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($releases as $release)
                            <tr>
                                <td>
                                    <strong>{{ $release->version }}</strong>
                                    @if($release->is_mandatory)
                                        <span class="badge badge-mandatory">Obligatoire</span>
                                    @endif
                                </td>
                                <td>{{ ucfirst($release->platform) }}</td>
                                <td>
                                    {{ $release->file_name }}<br>
                                    <span class="file-size">{{ number_format($release->file_size / 1024 / 1024, 2) }} Mo</span>
                                </td>
                                <td>
                                    <span class="badge {{ $release->is_active ? 'badge-active' : 'badge-inactive' }}">
                                        {{ $release->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $release->created_at->format('d/m/Y H:i') }}</td>
                                <td class="actions">
                                    <form action="{{ route('admin.releases.toggle', $release) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-secondary btn-small">
                                            {{ $release->is_active ? 'Désactiver' : 'Activer' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.releases.destroy', $release) }}" method="POST" onsubmit="return confirm('Supprimer cette release ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-small">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <p>Aucune release pour le moment.</p>
                    <p>Cliquez sur "Nouvelle Release" pour en ajouter une.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
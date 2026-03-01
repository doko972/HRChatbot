<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil - HR Chatbot</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-navbar />

    <!-- Main Content -->
    <main class="main-content">
        <div class="page-header">
            <lottie-player src="/animations/logo.json" background="transparent" speed="1"
                style="width: 80px; height: 80px; margin: 0 auto 1rem;" loop autoplay>
            </lottie-player>
            <h1>Mon Profil</h1>
            <p>Gérez vos informations personnelles</p>
        </div>

        <!-- Informations du profil -->
        <div class="profile-card">
            <h2>👤 Informations personnelles</h2>
            <p class="description">Mettez à jour votre nom et adresse email.</p>

            @if (session('status') === 'profile-updated')
                <div class="success-message" style="margin-bottom: 1rem;">
                    ✅ Profil mis à jour avec succès.
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                        class="{{ $errors->has('name') ? 'input-error' : '' }}" required>
                    @if ($errors->has('name'))
                        <p style="color: #fca5a5; font-size: 0.85rem; margin-top: 0.25rem;">{{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                        class="{{ $errors->has('email') ? 'input-error' : '' }}" required>
                    @if ($errors->has('email'))
                        <p style="color: #fca5a5; font-size: 0.85rem; margin-top: 0.25rem;">
                            {{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>

        <!-- Modifier le mot de passe -->
        <div class="profile-card">
            <h2>🔒 Modifier le mot de passe</h2>
            <p class="description">Assurez-vous d'utiliser un mot de passe long et sécurisé.</p>

            @if (session('status') === 'password-updated')
                <div class="success-message" style="margin-bottom: 1rem;">
                    ✅ Mot de passe mis à jour avec succès.
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="current_password">Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password"
                        class="{{ $errors->updatePassword->has('current_password') ? 'input-error' : '' }}"
                        placeholder="••••••••">
                    @if ($errors->updatePassword->has('current_password'))
                        <p style="color: #fca5a5; font-size: 0.85rem; margin-top: 0.25rem;">
                            {{ $errors->updatePassword->first('current_password') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input type="password" id="password" name="password"
                        class="{{ $errors->updatePassword->has('password') ? 'input-error' : '' }}"
                        placeholder="••••••••">
                    @if ($errors->updatePassword->has('password'))
                        <p style="color: #fca5a5; font-size: 0.85rem; margin-top: 0.25rem;">
                            {{ $errors->updatePassword->first('password') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="••••••••">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
                </div>
            </form>
        </div>

        <!-- Supprimer le compte -->
        <div class="profile-card danger-zone">
            <h2>⚠️ Supprimer le compte</h2>
            <p class="description">Une fois votre compte supprimé, toutes vos données seront définitivement effacées.
                Cette action est irréversible.</p>

            <form method="POST" action="{{ route('profile.destroy') }}"
                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
                @csrf
                @method('delete')

                <div class="form-group">
                    <label for="delete_password">Confirmez votre mot de passe</label>
                    <input type="password" id="delete_password" name="password"
                        class="{{ $errors->userDeletion->has('password') ? 'input-error' : '' }}"
                        placeholder="••••••••">
                    @if ($errors->userDeletion->has('password'))
                        <p style="color: #fca5a5; font-size: 0.85rem; margin-top: 0.25rem;">
                            {{ $errors->userDeletion->first('password') }}</p>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
                </div>
            </form>
        </div>
    </main>

    <x-footer />
</body>

</html>

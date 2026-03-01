<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe - HR Chatbot</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="layout-auth">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <a href="{{ route('home') }}">
                    <lottie-player
                        src="/animations/logo.json"
                        background="transparent"
                        speed="1"
                        style="width: 80px; height: 80px; margin: 0 auto;"
                        loop
                        autoplay>
                    </lottie-player>
                </a>
                <h1>Nouveau mot de passe</h1>
                <p>Choisissez un nouveau mot de passe sécurisé pour votre compte.</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email', $request->email) }}" 
                        placeholder="vous@exemple.com"
                        class="{{ $errors->has('email') ? 'input-error' : '' }}"
                        required 
                        autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••"
                        class="{{ $errors->has('password') ? 'input-error' : '' }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="••••••••"
                        required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Réinitialiser le mot de passe
                </button>
            </form>
        </div>

        <a href="{{ route('home') }}" class="back-home">
            ← Retour à l'accueil
        </a>
    </div>
</body>
</html>
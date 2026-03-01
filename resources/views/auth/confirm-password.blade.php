<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer le mot de passe - HR Chatbot</title>
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
                <h1>🔒 Zone sécurisée</h1>
                <p>Veuillez confirmer votre mot de passe avant de continuer.</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="••••••••"
                        class="{{ $errors->has('password') ? 'input-error' : '' }}"
                        required 
                        autofocus>
                </div>

                <button type="submit" class="btn btn-primary">
                    Confirmer
                </button>
            </form>
        </div>

        <a href="{{ route('dashboard') }}" class="back-home">
            ← Retour au dashboard
        </a>
    </div>
</body>
</html>
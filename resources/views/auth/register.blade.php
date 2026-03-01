<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - HR Chatbot</title>
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
                <h1>Créer un compte</h1>
                <p>Rejoignez HR Chatbot gratuitement</p>
                <div class="features-list">
                    <span class="feature-badge">🧠 IA intelligente</span>
                    <span class="feature-badge">🔍 Recherche web</span>
                    <span class="feature-badge">💾 Export</span>
                </div>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        placeholder="Jean Dupont"
                        class="{{ $errors->has('name') ? 'input-error' : '' }}"
                        required 
                        autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="vous@exemple.com"
                        class="{{ $errors->has('email') ? 'input-error' : '' }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
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
                    Créer mon compte
                </button>
            </form>

            <div class="auth-footer">
                Déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </div>

        <a href="{{ route('home') }}" class="back-home">
            ← Retour à l'accueil
        </a>
    </div>
</body>
</html>
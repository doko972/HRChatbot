<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - HR Chatbot</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="layout-auth">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <a href="{{ route('home') }}">
                    <lottie-player src="/animations/logo.json" background="transparent" speed="1"
                        style="width: 80px; height: 80px; margin: 0 auto;" loop autoplay>
                    </lottie-player>
                </a>
                <h1>Connexion</h1>
                <p>Connectez-vous à votre compte HR Chatbot</p>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="vous@exemple.com" class="{{ $errors->has('email') ? 'input-error' : '' }}" required
                        autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••"
                        class="{{ $errors->has('password') ? 'input-error' : '' }}" required>
                </div>

                @if (Route::has('password.request'))
                    <div class="form-options">
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Mot de passe oublié ?
                        </a>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">
                    Se connecter
                </button>
            </form>

            <div class="auth-footer">
                Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
            </div>
        </div>

        <a href="{{ route('home') }}" class="back-home">
            ← Retour à l'accueil
        </a>
    </div>
</body>

</html>
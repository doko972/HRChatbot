<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérifier votre email - HR Chatbot</title>
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
                <div class="email-icon">📧</div>
                <h1>Vérifiez votre email</h1>
                <p>
                    Merci pour votre inscription ! Avant de commencer, veuillez vérifier votre adresse email en cliquant sur le lien que nous venons de vous envoyer.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="success-message">
                    ✅ Un nouveau lien de vérification a été envoyé à votre adresse email.
                </div>
            @endif

            <div class="info-box">
                <p>
                    💡 Si vous ne trouvez pas l'email, vérifiez votre dossier spam ou courrier indésirable.
                </p>
            </div>

            <div class="actions">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Renvoyer l'email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>

        <a href="{{ route('home') }}" class="back-home">
            ← Retour à l'accueil
        </a>
    </div>
</body>
</html>
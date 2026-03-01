<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès refusé - HR Chatbot</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss'])
</head>
<body class="layout-auth">
    <div class="auth-container">
        <div class="auth-card" style="text-align: center;">
            <div class="auth-header">
                <a href="{{ route('home') }}">
                    <lottie-player src="/animations/logo.json" background="transparent" speed="1"
                        style="width: 80px; height: 80px; margin: 0 auto;" loop autoplay>
                    </lottie-player>
                </a>
                <h1>403</h1>
                <p>{{ $exception->getMessage() ?: 'Accès refusé.' }}</p>
            </div>
            <a href="{{ url()->previous() !== url()->current() ? url()->previous() : route('home') }}"
               class="btn btn-primary" style="margin-top: 1rem;">
                Retour
            </a>
        </div>
    </div>
</body>
</html>

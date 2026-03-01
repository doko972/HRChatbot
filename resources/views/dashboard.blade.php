<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - HR Chatbot</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-navbar />

    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <lottie-player src="/animations/logo.json" background="transparent" speed="1"
                style="width: 100px; height: 100px; margin: 0 auto 1rem;" loop autoplay>
            </lottie-player>
            <h1>Bienvenue, {{ Auth::user()->name }} !</h1>
            <p>Gérez votre compte et téléchargez l'application HR Chatbot.</p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon">📧</div>
                <div class="label">Email</div>
                <div style="color: var(--text-light); font-size: 0.95rem; margin-top: 0.5rem;">{{ Auth::user()->email }}</div>
            </div>
            <div class="stat-card">
                <div class="icon">📅</div>
                <div class="label">Membre depuis</div>
                <div style="color: var(--text-light); font-size: 0.95rem; margin-top: 0.5rem;">
                    {{ Auth::user()->created_at->format('d/m/Y') }}
                </div>
            </div>
            <div class="stat-card">
                <div class="icon">✅</div>
                <div class="label">Statut</div>
                <div style="color: var(--success); font-size: 0.95rem; margin-top: 0.5rem;">Compte actif</div>
            </div>
        </div>

        <!-- Action Cards -->
        <div class="action-grid">
            <div class="action-card">
                <div class="icon">⬇️</div>
                <h3>Télécharger HR Chatbot</h3>
                <p>Téléchargez l'application desktop pour Windows et commencez à discuter avec votre assistant IA.</p>
                <a href="{{ route('download') }}" class="btn btn-primary">Télécharger</a>
            </div>
            <div class="action-card">
                <div class="icon">👤</div>
                <h3>Mon profil</h3>
                <p>Modifiez vos informations personnelles et votre mot de passe.</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-outline">Gérer mon profil</a>
            </div>
            <div class="action-card">
                <div class="icon">📖</div>
                <h3>Documentation</h3>
                <p>Consultez la documentation pour découvrir toutes les fonctionnalités de HR Chatbot.</p>
                <a href="{{ route('home') }}#features" class="btn btn-outline">Voir les fonctionnalités</a>
            </div>
        </div>
    </main>
<x-footer />
</body>

</html>

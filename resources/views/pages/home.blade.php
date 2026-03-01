<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Chatbot - Votre assistant IA intelligent</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <x-navbar />

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Votre assistant IA intelligent</h1>
            <p>
                HR Chatbot est un écosystème complet pour discuter avec l'IA. 
                Disponible sur navigateur, bureau Windows et mobile Android. 
                Un seul compte, toutes vos conversations synchronisées.
            </p>
            <div class="hero-buttons">
                @auth
                    <a href="{{ route('cortex.chat') }}" class="btn btn-primary">Discuter maintenant</a>
                    <a href="{{ route('download') }}" class="btn btn-outline">Télécharger l'app</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">Commencer gratuitement</a>
                    <a href="{{ route('login') }}" class="btn btn-outline">J'ai déjà un compte</a>
                @endauth
            </div>
        </div>
        <div class="hero-animation">
            <lottie-player src="/animations/logo.json" background="transparent" speed="1"
                style="width: 350px; height: 350px;" loop autoplay>
            </lottie-player>
        </div>
    </section>

    <!-- Platforms Section -->
    <section class="platforms" id="platforms">
        <div class="platforms-container">
            <h2>Un assistant, trois plateformes</h2>
            <p class="subtitle">
                Accédez à HR Chatbot où que vous soyez, depuis n'importe quel appareil.
                Vos conversations sont automatiquement synchronisées.
            </p>
            <div class="platforms-grid">
                <!-- HR Chatbot Web -->
                <div class="platform-card">
                    <div class="platform-icon">🌐</div>
                    <h3>HR Chatbot Web</h3>
                    <div class="platform-type">Navigateur</div>
                    <p>Accédez à HR Chatbot directement depuis votre navigateur, sans rien installer.</p>
                    <ul class="platform-features">
                        <li>Aucune installation requise</li>
                        <li>Accessible partout</li>
                        <li>Interface complète</li>
                        <li>Toutes les fonctionnalités</li>
                    </ul>
                    @auth
                        <a href="{{ route('cortex.chat') }}" class="btn btn-primary">Ouvrir HR Chatbot Web</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary">Commencer</a>
                    @endauth
                </div>

                <!-- HR Chatbot Desktop -->
                <div class="platform-card">
                    <div class="platform-icon">🖥️</div>
                    <h3>HR Chatbot Desktop</h3>
                    <div class="platform-type">Windows</div>
                    <p>Un widget discret toujours accessible sur votre bureau Windows.</p>
                    <ul class="platform-features">
                        <li>Widget compact</li>
                        <li>Toujours au premier plan</li>
                        <li>Raccourcis clavier</li>
                        <li>Mises à jour automatiques</li>
                    </ul>
                    @auth
                        <a href="{{ route('download') }}" class="btn btn-primary">Télécharger</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary">Commencer</a>
                    @endauth
                </div>

                <!-- HR Chatbot Mobile (PWA) -->
                <div class="platform-card">
                    <div class="platform-icon">📲</div>
                    <h3>HR Chatbot Mobile</h3>
                    <div class="platform-type">iOS · Android</div>
                    <p>Installez HR Chatbot sur votre smartphone comme une application native, sans passer par un store.</p>
                    <ul class="platform-features">
                        <li>Installation en un clic</li>
                        <li>Interface tactile optimisée</li>
                        <li>Notifications push</li>
                        <li>Fonctionne hors connexion</li>
                    </ul>
                    @auth
                        <a href="{{ route('cortex.chat') }}" class="btn btn-primary">Ouvrir &amp; installer</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary">Commencer</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <h2>Fonctionnalités</h2>
        <p class="subtitle">Toutes ces fonctionnalités sont disponibles sur les 3 plateformes</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h3>Multi-modèles IA</h3>
                <p>Choisissez entre GPT-4o, GPT-4o Mini, Claude Sonnet 4 ou Claude Haiku selon vos besoins.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Recherche web</h3>
                <p>Accédez à des informations actualisées grâce à la recherche web intégrée avec Tavily.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3>Génération d'images</h3>
                <p>Créez des images uniques avec DALL-E 3 directement depuis la conversation.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👁️</div>
                <h3>Analyse d'images</h3>
                <p>Envoyez des images et laissez l'IA les analyser et répondre à vos questions.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📁</div>
                <h3>Dossiers</h3>
                <p>Organisez vos conversations dans des dossiers pour mieux vous y retrouver.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🌓</div>
                <h3>Thème clair/sombre</h3>
                <p>Choisissez le thème qui vous convient pour un confort visuel optimal.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💻</div>
                <h3>Code & Markdown</h3>
                <p>Affichez du code avec coloration syntaxique et un rendu Markdown complet.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔄</div>
                <h3>Synchronisation</h3>
                <p>Retrouvez vos conversations sur tous vos appareils, automatiquement.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Streaming temps réel</h3>
                <p>Les réponses s'affichent en temps réel, mot par mot, pour plus de fluidité.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Prêt à commencer ?</h2>
        <p>Créez votre compte gratuitement et accédez à HR Chatbot sur tous vos appareils.</p>
        <div class="cta-buttons">
            @auth
                <a href="{{ route('cortex.chat') }}" class="btn btn-primary">Ouvrir HR Chatbot</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-primary">Créer un compte gratuit</a>
                <a href="{{ route('login') }}" class="btn btn-outline">Se connecter</a>
            @endauth
        </div>
    </section>

    <x-footer />
</body>

</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Télécharger HR Chatbot</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar />
    
    <!-- Main Content -->
    <main class="main-content">
        <!-- Welcome Message -->
        <div class="welcome-message">
            <div class="user-badge">
                <span>✓</span> Connecté en tant que {{ Auth::user()->name }}
            </div>
            <h1>Télécharger HR Chatbot</h1>
            <p>Choisissez la version adaptée à votre appareil et commencez à discuter avec votre assistant IA.</p>
        </div>

        <!-- Alert Messages -->
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Web CTA -->
        <div class="web-cta">
            <h2>🌐 Pas envie d'installer ?</h2>
            <p>Utilisez HR Chatbot directement dans votre navigateur, sans rien télécharger !</p>
            <a href="{{ route('cortex.chat') }}" class="btn btn-large">Ouvrir HR Chatbot Web</a>
        </div>

        <!-- Download Grid -->
        <div class="download-grid">
            <!-- Windows -->
            <div class="download-section windows">
                <div class="platform-icon">🖥️</div>
                <h2>HR Chatbot Desktop</h2>
                <div class="platform-name">Windows</div>
                <div class="compatibility">Windows 10 / 11 (64-bit)</div>
                <a href="{{ route('download.exe') }}" class="btn btn-windows btn-large">
                    ⬇️ Télécharger .exe
                </a>
            </div>

            <!-- Mobile PWA -->
            <div class="download-section android">
                <div class="platform-icon">📲</div>
                <h2>HR Chatbot Mobile</h2>
                <div class="platform-name">iOS · Android</div>
                <div class="compatibility">Depuis votre navigateur mobile</div>
                <a href="{{ route('cortex.chat') }}" class="btn btn-android btn-large">
                    Ouvrir &amp; installer
                </a>
            </div>
        </div>

        <!-- Security / Install Notices -->
        <div class="notice-grid">
            <!-- Windows Notice -->
            <div class="notice">
                <h2><span class="icon">🛡️</span> Windows SmartScreen</h2>
                <p>
                    Windows peut afficher un avertissement car HR Chatbot n'est pas encore signé par Microsoft.
                    <strong>C'est normal et sans danger.</strong>
                </p>
                <div class="notice-steps">
                    <h3>Comment procéder ?</h3>
                    <ol>
                        <li>Cliquez sur <strong>"Informations complémentaires"</strong></li>
                        <li>Puis cliquez sur <strong>"Exécuter quand même"</strong></li>
                    </ol>
                </div>
                <div class="security-note">
                    <span class="icon">✅</span>
                    <p>Application sûre développée par Atelier Normand du Web.</p>
                </div>
            </div>

            <!-- PWA Notice -->
            <div class="notice">
                <h2><span class="icon">📲</span> Installer sur mobile</h2>
                <p>
                    HR Chatbot s'installe comme une app native depuis votre navigateur,
                    <strong>sans passer par un store.</strong>
                </p>
                <div class="notice-steps">
                    <h3>Comment procéder ?</h3>
                    <ol>
                        <li>Ouvrez HR Chatbot dans Chrome (Android) ou Safari (iOS)</li>
                        <li>Android : appuyez sur <strong>"Ajouter à l'écran d'accueil"</strong></li>
                        <li>iOS : appuyez sur Partager puis <strong>"Sur l'écran d'accueil"</strong></li>
                    </ol>
                </div>
                <div class="security-note">
                    <span class="icon">✅</span>
                    <p>Aucun fichier à télécharger, mises à jour automatiques.</p>
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="instructions">
            <h2>📋 Guide d'installation</h2>
            <div class="instructions-grid">
                <!-- Windows Instructions -->
                <div class="instructions-column">
                    <h3>🖥️ Windows</h3>
                    <div class="steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Téléchargez</h4>
                                <p>Cliquez sur le bouton de téléchargement .exe</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Installez</h4>
                                <p>Double-cliquez et suivez l'assistant</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Lancez</h4>
                                <p>Ouvrez depuis le menu Démarrer</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Connectez-vous</h4>
                                <p>Utilisez votre compte HR Chatbot</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PWA Mobile Instructions -->
                <div class="instructions-column">
                    <h3>📲 Mobile (PWA)</h3>
                    <div class="steps">
                        <div class="step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Ouvrez HR Chatbot</h4>
                                <p>Depuis Chrome (Android) ou Safari (iOS)</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Installez</h4>
                                <p>Bannière Chrome ou menu Partager sur iOS</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Confirmez</h4>
                                <p>Appuyez sur "Ajouter" / "Installer"</p>
                            </div>
                        </div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>C'est prêt !</h4>
                                <p>L'icône HR Chatbot apparaît sur votre écran d'accueil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <x-footer />
</body>
</html>
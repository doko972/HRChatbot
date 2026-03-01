

{{-- Appliquer le thème immédiatement pour éviter le flash --}}
<script>
    (function() {
        const t = localStorage.getItem('cortex-theme') || 'dark';
        document.documentElement.setAttribute('data-theme', t);
    })();
</script>

<!-- Navigation -->
<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-brand">
        <lottie-player src="/animations/logo.json" background="transparent" speed="1"
            style="width: 40px; height: 40px;" loop autoplay>
        </lottie-player>
        HR Chatbot
    </a>

    <div class="nav-links">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
        @auth
            <a href="{{ route('cortex.chat') }}" class="{{ request()->routeIs('cortex.*') ? 'active' : '' }}">Discuter</a>
            <a href="{{ route('download') }}" class="{{ request()->routeIs('download') ? 'active' : '' }}">Télécharger</a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">Mon profil</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Déconnexion</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline">Connexion</a>
            <a href="{{ route('register') }}" class="btn btn-primary">S'inscrire</a>
        @endauth
    </div>

    <!-- Bouton Thème -->
    <button class="btn-theme-nav" id="btnThemeNav" title="Changer de thème">🌙</button>

    <!-- Bouton Burger -->
    <button class="burger" id="burger" aria-label="Menu" aria-expanded="false">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
    </button>
</nav>

<!-- Menu Mobile Overlay -->
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-content">
        <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a>
@auth
            <a href="{{ route('cortex.chat') }}" class="mobile-link {{ request()->routeIs('cortex.*') ? 'active' : '' }}">💬 Discuter</a>
            <a href="{{ route('download') }}" class="mobile-link {{ request()->routeIs('download') ? 'active' : '' }}">Télécharger</a>
            <a href="{{ route('profile.edit') }}" class="mobile-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">Mon profil</a>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="mobile-link logout"
                    style="background: none; border: none; cursor: pointer; font-family: inherit;">
                    Déconnexion
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="mobile-link">Connexion</a>
            <a href="{{ route('register') }}" class="mobile-link btn-primary">S'inscrire</a>
        @endauth
        <button class="mobile-link mobile-theme-toggle" id="btnThemeNavMobile"
            style="background: none; border: none; cursor: pointer; font-family: inherit; text-align: left; width: 100%;">
            🌙 Thème sombre / clair
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const burger = document.getElementById('burger');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        // ---- Thème ----
        const btnThemeNav       = document.getElementById('btnThemeNav');
        const btnThemeNavMobile = document.getElementById('btnThemeNavMobile');

        function applyTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('cortex-theme', theme);
            const icon = theme === 'dark' ? '☀️' : '🌙';
            btnThemeNav.textContent       = icon;
            btnThemeNav.title             = theme === 'dark' ? 'Passer en mode clair' : 'Passer en mode sombre';
            btnThemeNavMobile.textContent = icon + ' Thème sombre / clair';
        }

        // Sync le bouton avec le thème déjà appliqué
        applyTheme(localStorage.getItem('cortex-theme') || 'dark');

        function toggleTheme() {
            const current = document.documentElement.getAttribute('data-theme') || 'dark';
            applyTheme(current === 'dark' ? 'light' : 'dark');
        }

        btnThemeNav.addEventListener('click', toggleTheme);
        btnThemeNavMobile.addEventListener('click', toggleTheme);
        // ---------------

        // Toggle menu
        burger.addEventListener('click', () => {
            const isActive = burger.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            burger.setAttribute('aria-expanded', isActive);
            document.body.style.overflow = isActive ? 'hidden' : '';
        });

        // Fermer le menu au clic sur un lien
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('active');
                mobileMenu.classList.remove('active');
                burger.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            });
        });

        // Fermer avec la touche Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                burger.classList.remove('active');
                mobileMenu.classList.remove('active');
                burger.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        });
    });
</script>
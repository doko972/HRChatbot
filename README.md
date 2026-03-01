# New-chatbot-api
Projet Laravel pour la gestion de la clef API et et la création des comptes utilisateurs du chatbot-widget.

========================================
   CORTEX - COMMANDES IMPORTANTES
========================================

----------------------------------------
DÉVELOPPEMENT
----------------------------------------

# Laravel - Démarrer le serveur API
cd C:\wamp64\www\chatbot-api
php artisan serve

# Tauri - Mode développement
cd C:\wamp64\www\chatbot-widget
npm run tauri dev

----------------------------------------
COMPILATION / BUILD
----------------------------------------

# Laravel - Compiler les assets CSS/JS
cd C:\wamp64\www\chatbot-api
npm run build

# Tauri - Générer les installateurs
cd C:\wamp64\www\chatbot-widget
npm run tauri build

# Tauri - Générer les icônes
npm run tauri icon app-icon.png

----------------------------------------
COPIER LES INSTALLATEURS VERS LARAVEL
----------------------------------------

copy src-tauri\target\release\bundle\msi\*.msi C:\wamp64\www\chatbot-api\public\downloads\
copy src-tauri\target\release\bundle\nsis\*.exe C:\wamp64\www\chatbot-api\public\downloads\

----------------------------------------
NETTOYAGE CACHE WINDOWS (ICÔNES)
----------------------------------------

ie4uinit.exe -ClearIconCache
Stop-Process -Name explorer -Force; Start-Process explorer

# Alternative complète
Remove-Item "$env:LOCALAPPDATA\IconCache.db" -Force -ErrorAction SilentlyContinue
Remove-Item "$env:LOCALAPPDATA\Microsoft\Windows\Explorer\iconcache*" -Force -ErrorAction SilentlyContinue
Stop-Process -Name explorer -Force; Start-Process explorer

----------------------------------------
LARAVEL - COMMANDES ARTISAN UTILES
----------------------------------------

# Vider les caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Voir les routes
php artisan route:list

# Migrations
php artisan migrate
php artisan migrate:fresh

# Créer un controller
php artisan make:controller NomController

# Créer un model avec migration
php artisan make:model Nom -m

----------------------------------------
CHEMINS DES PROJETS
----------------------------------------

Laravel API  : C:\wamp64\www\chatbot-api
Tauri App    : C:\wamp64\www\chatbot-widget
Installateurs: C:\wamp64\www\chatbot-api\public\downloads\

----------------------------------------
FICHIERS DE CONFIGURATION
----------------------------------------

Laravel .env         : C:\wamp64\www\chatbot-api\.env
Tauri config         : C:\wamp64\www\chatbot-widget\src-tauri\tauri.conf.json
URL API (main.js)    : C:\wamp64\www\chatbot-widget\src\main.js

----------------------------------------
URLS LOCALES
----------------------------------------

Site web     : http://127.0.0.1:8000
API          : http://127.0.0.1:8000/api
Dashboard    : http://127.0.0.1:8000/dashboard
Téléchargement: http://127.0.0.1:8000/download

========================================

# modifier la limite du nombre d'images géneré

ImageController.php = private const DAILY_LIMIT = 2;

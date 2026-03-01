Voici la liste complète des fichiers à copier pour intégrer uniquement la partie chat dans un autre projet Laravel :

Controllers API
app/Http/Controllers/Api/ChatController.php ← le principal
app/Http/Controllers/Api/ConversationController.php
app/Http/Controllers/Api/FolderController.php
app/Http/Controllers/Api/SystemPromptController.php
app/Http/Controllers/Api/DocumentController.php
app/Http/Controllers/CortexWebController.php ← rend la vue
app/Http/Controllers/SharedConversationController.php
Models
app/Models/Conversation.php
app/Models/Message.php
app/Models/Folder.php
app/Models/SystemPrompt.php
⚠️ Dans User.php de l'autre projet, ajouter les relations hasMany vers Conversation, Folder.

Migrations

2025_12_08_..._create_conversations_table.php
2025_12_08_..._create_messages_table.php
2025_12_19_..._create_folders_table.php
2025_12_19_..._add_folder_id_to_conversations_table.php
2025_12_18_..._add_has_image_to_messages_table.php
2026_02_20_..._add_image_path_to_messages_table.php
2026_02_25_..._add_share_token_to_conversations_table.php
2026_02_25_..._create_system_prompts_table.php
Vues & Assets
resources/views/cortex/chat.blade.php
resources/views/shared/conversation.blade.php
resources/views/layouts/app.blade.php (ou adapter à ton layout existant)
resources/scss/components/_chat.scss
resources/scss/components/_buttons.scss
resources/scss/components/_modals.scss
resources/scss/_variables.scss
Services
app/Services/DocumentExtractorService.php
Routes à copier/fusionner
Dans routes/api.php et routes/web.php, copier uniquement les routes liées aux conversations, messages, folders, system-prompts, chat-stream.

Config & .env
Dans config/services.php ajouter les entrées :


'brave'     => ['api_key' => env('BRAVE_SEARCH_API_KEY')],
'anthropic' => ['api_key' => env('ANTHROPIC_API_KEY')],
Et dans .env du nouveau projet :


OPENAI_API_KEY=...
ANTHROPIC_API_KEY=...
BRAVE_SEARCH_API_KEY=...
Packages Composer à installer

composer require openai-php/laravel
composer require anthropics/anthropic-sdk-php  # si utilisé directement
Résumé : ~15 fichiers PHP + les migrations + la vue + les SCSS. Le plus complexe sera d'adapter User.php et les routes dans le projet cible.
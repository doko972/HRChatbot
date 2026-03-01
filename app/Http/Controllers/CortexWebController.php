<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class CortexWebController extends Controller
{
    /**
     * Affiche l'interface de chat Cortex Web
     */
    public function index()
    {
        return view('cortex.chat');
    }

    /**
     * Affiche une conversation spécifique
     */
    public function show(Conversation $conversation)
    {
        // Vérifie que la conversation appartient à l'utilisateur
        if ($conversation->user_id !== auth()->id()) {
            abort(403);
        }

        return view('cortex.chat', [
            'currentConversation' => $conversation
        ]);
    }
}
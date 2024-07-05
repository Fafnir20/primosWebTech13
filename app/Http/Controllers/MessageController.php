<?php

namespace App\Http\Controllers;

use App\Models\MensagemPrivada;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $message = MensagemPrivada::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        // Aqui você pode enviar a mensagem usando o Pusher
        event(new \App\Events\MessageSent($message));

        return response()->json(['status' => 'Message Sent!']);
    }
}

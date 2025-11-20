<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Message; // will create later

class MessageController extends Controller
{
    public function index()
    {
        if (!class_exists(Message::class)) {
            $messages = collect();
        } else {
            $user = Auth::user();
            if ($user && $user->role === 'admin') {
                $messages = Message::latest()->paginate(10);
            } else {
                // saját üzenetek: user_id vagy email egyezés
                $messages = Message::where(function($q) use ($user){
                    $q->where('user_id', $user->id)
                      ->orWhere('email', $user->email);
                })->latest()->paginate(10);
            }
        }
        return view('messages.index', compact('messages'));
    }
}

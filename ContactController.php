<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message; // will create later

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'content' => 'required|string|min:5',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('contact.show')->with('status', 'Üzenet elküldve');
    }
}

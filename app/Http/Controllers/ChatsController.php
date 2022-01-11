<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\MessageDoctor;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.chat');
    }

    public function fetchMessages()
    {
        return MessageDoctor::with('user')->get();
    }


    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
        'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();
        
        return ['status' => 'Message Sent!'];
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNot('id', auth()->id())->get();

        // dd($users);
        return view('dashboard', ['users' => $users]);
    }

    public function messages(User $user)
    {
        $chatMessageModel = new ChatMessage();
        $messages = $chatMessageModel->list($user);

        return response()->json([
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = new ChatMessage();

        $message->sender_id = auth()->id();
        $message->receiver_id = $request->receiver_id;
        $message->text_content = $request->text_content;
        $message->save();

        broadcast(new MessageSent($message));

        return response()->json([
            'message' => $message
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('chat-room', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatMessage $chatMessage)
    {
        //
    }
}

<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessage extends Component
{
    public $target;

    public $textContent = '';

    public function mount($user)
    {
        $this->target = $user;
    }

    public function sendMessage()
    {
        $chatMessage = new ChatMessage();

        $chatMessage->sender_id = Auth::user()->id;
        $chatMessage->receiver_id = $this->target->id;
        $chatMessage->text_content = $this->textContent;
        $chatMessage->save();

        $this->textContent = '';

        $this->dispatch('message-sent');
        MessageSent::dispatch($chatMessage);
    }

    public function render()
    {
        return view('livewire.send-message');
    }
}

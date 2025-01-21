<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\ChatMessage;
use Livewire\Component;

class SendMessage extends Component
{
    public $target;

    public $text_content = '';

    public function mount($user)
    {
        $this->target = $user;
    }

    public function sendMessage()
    {
        $chatMessage = new ChatMessage();

        $chatMessage->sender_id = auth()->id();
        $chatMessage->receiver_id = $this->target->id;
        $chatMessage->text_content = $this->text_content;
        $chatMessage->save();

        $this->text_content = '';

        $this->dispatch('message-sent');
        MessageSent::dispatch($chatMessage);
    }

    public function render()
    {
        return view('livewire.send-message');
    }
}

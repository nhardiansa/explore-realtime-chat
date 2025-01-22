<?php

namespace App\Livewire;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MessageList extends Component
{
    public $messages = [];
    public $user;
    public $currentUserId;

    public function mount($user)
    {
        $this->user = $user;
        $this->getListMessages();
        $this->currentUserId = Auth::user()->id;
    }
    public function render()
    {
        return view('livewire.message-list');
    }

    #[On("message-sent")]
    public function getListMessages()
    {
        $messageModel = new ChatMessage();
        $result = $messageModel->list($this->user);
        $this->messages = $result->toArray();
    }

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->currentUserId}:MessageSent" => "getListMessages"
        ];
    }
}

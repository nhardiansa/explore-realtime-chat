<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChatMessage extends Component
{
    /**
     * Create a new component instance.
     */

    public $name;
    public $textContent;
    public $isReceiver = false;

    public function __construct($name, $textContent, $isReceiver)
    {
        $this->name = $name;
        $this->textContent = $textContent;
        $this->isReceiver = $isReceiver;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.chat-message');
    }
}

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
    public $text_content;
    public $is_receiver = false;

    public function __construct($name, $text_content, $is_receiver)
    {
        $this->name = $name;
        $this->text_content = $text_content;
        $this->is_receiver = $is_receiver;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.chat-message');
    }
}

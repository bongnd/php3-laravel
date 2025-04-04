<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notification extends Component
{
    public $background;

    public function __construct($background = 'light')
    {
        $this->background = $background;
    }

    public function render()
    {
        return view('components.notification');
    }
}

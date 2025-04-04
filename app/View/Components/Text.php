<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Text extends Component
{
    public $type;
    public $background;

    public function __construct($type = 'content', $background = 'transparent')
    {
        $this->type = $type;
        $this->background = $background;
    }

    public function render()
    {
        return view('components.text');
    }
}

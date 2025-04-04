<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $background;
    public $color;

    public function __construct($background = 'secondary', $color = 'white')
    {
        $this->background = $background;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.button');
    }
}

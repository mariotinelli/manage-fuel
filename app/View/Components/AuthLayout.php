<?php

namespace App\View\Components;

use Illuminate\View\{Component, View};

class AuthLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.auth');
    }
}

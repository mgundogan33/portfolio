<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FrontendLayout extends Component
{

    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('layouts.frontend');
    }
}

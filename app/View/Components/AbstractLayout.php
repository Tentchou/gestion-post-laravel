<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

abstract class AbstractLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $title = '')
    {
        $this->title = config('app.name').($title ? " | $title" : '');;
    }


    /**
     * Get the view / contents that represent the component.
     */
}

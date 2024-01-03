<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class error_msg extends Component
{
    /**
     * Create a new component instance.
     */

    
    public function __construct(public string $value, public string $message)
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.error_msg');
    }
}

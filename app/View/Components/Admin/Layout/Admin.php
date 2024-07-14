<?php

namespace App\View\Components\Admin\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Admin extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $page,
        public string $home,
        public $homeurl,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.layout.admin');
    }
}

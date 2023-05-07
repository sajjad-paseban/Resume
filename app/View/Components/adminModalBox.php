<?php

namespace App\View\Components;

use Illuminate\View\Component;

class adminModalBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $linkName,
        public string $title,
        public string $method,
        public string $route,
        public string $files,

    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-modal-box');
    }
}

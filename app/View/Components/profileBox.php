<?php

namespace App\View\Components;

use Illuminate\View\Component;

class profileBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $src,
        public string $firstname,
        public string $lastname

    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile-box');
    }
}

<?php

namespace App\View\Components;

use Blade;
use Illuminate\View\Component;

class contactInfoItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $src,
        public string $text

    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-info-item');
    }
}

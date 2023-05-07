<?php

namespace App\View\Components;

use Illuminate\View\Component;

class serviceItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $serviceName,
        public string $description,
        public int $price
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.service-item');
    }
}

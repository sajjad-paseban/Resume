<?php

namespace App\View\Components;

use Illuminate\View\Component;

class experienceItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $companyName,
        public int $from,
        public int $to,
        public string $role,
        public string $content,
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.experience-item');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class profile_image extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $image;
    public $size;

    public function __construct($image, $size)
    {
        $this->image = $image;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile_image');
    }
}

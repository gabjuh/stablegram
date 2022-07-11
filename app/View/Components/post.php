<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $image;
    public $avatar;
    public $created = 'lopikula';
    public $likes;
    public $text;

    public function __construct($avatar, $image, $text, $created = 0, $likes = 0)
    {
        $this->avatar = $avatar;
        $this->image = $image;
        $this->text = $text;
        $this->likes = $likes;
        $this->created = $created;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}

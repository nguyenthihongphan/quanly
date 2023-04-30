<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    // public $type;
    // public $message;
    // public function __construct($type,$message)
    // {
    //     $this->type = $type;
    //     $this->message = $message;
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
//     public function boot()
// {
//     Blade::component('alert', Alert::class);
// }

}

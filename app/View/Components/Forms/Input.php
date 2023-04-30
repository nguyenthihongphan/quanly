<?php

namespace App\View\Components\Forms;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $name;
    public $id;
    public $placehoder;
    public $class;

    public function __construct($id,$type,$name,$placehoder,$class)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->placehoder = $placehoder;
        $this->class = $class;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
    public function boot()
{
    Blade::component('input', Input::class);
}
}

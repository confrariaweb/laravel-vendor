<?php

namespace ConfrariaWeb\Vendor\Components;

use Illuminate\View\Component;

class CrudButtons extends Component
{

    public $id;
    public $routeName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $routeName)
    {
        $this->id = $id;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('cwVendor::components.crud-buttons');
    }
}

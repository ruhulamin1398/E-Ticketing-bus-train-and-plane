<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $dataArray;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($dataArray)
    {
        $this->dataArray= $dataArray;
       
 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
       
        return view('components.data-table');
    }
}

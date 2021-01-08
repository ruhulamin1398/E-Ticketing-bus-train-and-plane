<?php

namespace App\View\Components;

use Illuminate\View\Component;

class polarAreaChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $dataArray;
    public function __construct($dataArray)
    {
        $this->dataArray= $dataArray;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.polar-area-chart');
    }
}

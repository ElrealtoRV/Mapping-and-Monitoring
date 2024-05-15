<?php

namespace App\Http\Livewire\Map\Cas;

use Livewire\Component;
use App\Models\FireList;
use App\Models\TypeList;
use App\Models\LocationList;

class SecondFloor extends Component
{
    public $fire_list;

    public function mount()
    {
        $this->fire_list = FireList::all();

    }
    

    public function render()
    {
        return view('livewire.map.cas.second-floor');
    }
}

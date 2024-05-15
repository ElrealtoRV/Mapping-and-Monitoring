<?php

namespace App\Http\Livewire\Map\Cas;

use Livewire\Component;
use App\Models\FireList;
class FourthFloor extends Component
{
    public $selectedFloor = 'fourth-floor';

    public function showFloor($floor)
{
    $this->selectedFloor = $floor;
}
public function mount()
{
    $this->fire_list = FireList::all();

}
    public function render()
    {
        return view('livewire.map.cas.fourth-floor');
    }
}

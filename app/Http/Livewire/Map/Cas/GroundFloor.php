<?php

namespace App\Http\Livewire\Map\Cas;

use Livewire\Component;
use App\Models\FireList;
use App\Models\TypeList;
use App\Models\LocationList;
use Carbon\Carbon;

class GroundFloor extends Component
{
    public $selectedFloor = 'ground-floor';
    public $statuses = ['Active', 'Expired'];
    public $fireId;
    public $selectedRoom = '';
    public $fireCasDean = []; // Initialize as an empty array
    public $fireCas106 = []; // Initialize as an empty array
    public $fireCas105 = []; 
    public $fireCas104 = [];
    public $fireMassComm = []; 
    
    public $fireCas103 = []; 
    public $fireCas102 = [];
    public $fireCas101 = [];
    public $fireCas107 = [];
    public $fireCas108 = [];
    public $fireCas109 = [];
    public $fireCas110 = [];
    public $fireCas111 = [];
    public $fireCas112 = [];

    public function showFloor($floor)
    {
        $this->selectedFloor = $floor;
    }

    public function mount()
    {
        $this->fireCasDean = FireList::where('room', 'CASDEAN')->get();
        $this->fireCas106 = FireList::where('room', 'CAS106')->get();
        $this->fireCas105 = FireList::where('room', 'CAS105')->get();
        $this->fireCas104 = FireList::where('room', 'CAS104')->get();
        $this->fireMassComm = FireList::where('room', 'MCL')->get();
        $this->fireCas103 = FireList::where('room', 'CAS103')->get();
        $this->fireCas102 = FireList::where('room', 'CAS102')->get();
        $this->fireCas101 = FireList::where('room', 'CAS101')->get();
        $this->fireCas107 = FireList::where('room', 'CAS107')->get();
        $this->fireCas108 = FireList::where('room', 'CAS108')->get();
        $this->fireCas109 = FireList::where('room', 'CAS109')->get();
        $this->fireCas110 = FireList::where('room', 'CAS110')->get();
        $this->fireCas111 = FireList::where('room', 'CAS111')->get();
        $this->fireCas112 = FireList::where('room', 'CAS112')->get();
        $this->locations = LocationList::all(); // Fetch all locations
    }

    public function createFire($roomId)
    {
        $this->selectedRoom = $roomId;
        $this->emit('resetInputFields');
        $this->emit('openMapFormModal');
    }
    public function editFire($fireId)
    {
        $this->fireId = $fireId;
        $this->emit('fireId', $this->fireId);
        $this->emit('openMapFormModal');
        
    }
    

    public function render()
    {
        $query = FireList::query();
        $fire = $query->get();
        FireList::where('expiration_date', '<', Carbon::now())
        ->update(['status' => 'Expired']);
        return view('livewire.map.cas.ground-floor', [
            'locations' => $this->locations,
            'fireCasDean' => $this->fireCasDean,
            'fireCas106' => $this->fireCas106,
            'fireCas105' => $this->fireCas105,
            'fireCas104' => $this->fireCas104,
            'fireMassComm' => $this->fireMassComm,
            'fireCas103' => $this->fireCas103,
            'fireCas102' => $this->fireCas102,
            'fireCas101' => $this->fireCas101,
            'fireCas107' => $this->fireCas107,
            'fireCas108' => $this->fireCas108,
            'fireCas109' => $this->fireCas109,
            'fireCas110' => $this->fireCas110,
            'fireCas111' => $this->fireCas111,
            'fireCas112' => $this->fireCas112,
        ]);
    }
}

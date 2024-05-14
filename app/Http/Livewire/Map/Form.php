<?php

namespace App\Http\Livewire\Map;

use Livewire\Component;
use App\Models\FireList;
use App\Models\TypeList;
use App\Models\LocationList;

use App\Models\RecordLists;
use Illuminate\Support\Facades\Session;

class Form extends Component
{
    public $fireId, $type, $firename, $serial_number, $building, $floor, $room, $installation_date, $expiration_date, $description, $status = 'Active';
    public $action = '';  //flash
    public $message = '';  //flashSSS
    public $currentFire;
    public $fireCheck = [];
    public $selectedFire = [];
    public $viewMode = false;

    protected $listeners = [
        'fireId',
        'fireData',
        'resetInputFields',
        'openViewModal'
    ];
    public function fireData($fire)
    {
        $this->currentFire = $fire;
        // Optionally, you can also set the form fields with this data if needed
        $this->type = $fire['type'];
        $this->firename = $fire['firename'];
        $this->serial_number = $fire['serial_number'];
        $this->building = $fire['building'];
        $this->floor = $fire['floor'];
        $this->room = $fire['room'];
        $this->installation_date = $fire['installation_date'];
        $this->expiration_date = $fire['expiration_date'];
        $this->description = $fire['description'];
        // Set other form fields similarly
    }
    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function openViewModal($fireId)
    {
        
        $fire = FireList::findOrFail($fireId);
        $this->loadFormData($fire);
        $this->viewMode = true; // Set $viewMode to true when opening the view modal
        $this->emit('openViewModal');
    }
    public function fireId($fireId)
    {
        $this->resetInputFields();
        $this->fireId = $fireId;
        $fire = FireList::find($fireId);
        $this->loadFormData($fire);
        $this->selectedFire = $fire->getFireNames()->toArray();
        $this->viewMode = false;
    }
    public function loadFormData($fire)
    {
        $this->type = $fire->type;
        $this->firename = $fire->firename;
        $this->serial_number = $fire->serial_number;
        $this->building = $fire->building;
        $this->floor = $fire->floor;
        $this->room = $fire->room;
        $this->installation_date = $fire->installation_date;
        $this->expiration_date = $fire->expiration_date;
        $this->description = $fire->description;
        $this->status = $fire->status;
    }

    public function store()
    {
        if (is_object($this->selectedFire)) {
            $this->selectedFire = json_decode(json_encode($this->selectedFire), true);
        }
    
        if (empty($this->fireCheck)) {
            $this->fireCheck = array_map('strval', $this->selectedFire);
        }
    
        $data = $this->validate([
            'type' => 'required',
            'firename' => 'required',
            'serial_number' => 'required|digits:7',
            'building' => 'required',
            'floor' => 'nullable',
            'room' => 'required|unique:fire_lists,room,' . $this->fireId, // Check for uniqueness except for the current fireId
            'installation_date' => 'required|date',
            'expiration_date' => 'required|date',
            'description' => 'nullable',
            
        ]);
    
        if ($this->fireId) {
            $fire = FireList::find($this->fireId);
            $fire->update($data);
            $fire->syncFire($this->fireCheck);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            // Check if a record with the same room already exists
            $existingFire = FireList::where('room', $this->room)->first();
            if ($existingFire) {
                $this->addError('room', 'A record with the same room already exists.');
                return;
            }
    
            $fire = FireList::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }
    
        // Retrieve data from session based on the selected room
        $roomData = Session::get($this->room, []);
    
        // Merge current form data with session data
        $formData = array_merge($this->getData(), $roomData);
    
        // Store merged data in the session
        Session::put($this->room, $formData);

       
        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeMapFormModal');
        $this->emit('refreshParentCasFloor');
        $this->emit('refreshTable');
    }
    
    
    public function getData()
    {
        return [
            'type' => $this->type,
            'firename' => $this->firename,
            'serial_number' => $this->serial_number,
            'building' => $this->building,
            'floor' => $this->floor,
            'room' => $this->room,
            'installation_date' => $this->installation_date,
            'expiration_date' => $this->expiration_date,
            'description' => $this->description,
           
        ];
    }

    public function render()
    {
        $fire = FireList::all();
        $types = TypeList::all();
        $locations = LocationList::all();

        return view('livewire.map.form', [
            'fire' => $fire,
            'types' => $types,
            'locations' => $locations,
        ]);
    }
}

<?php

namespace App\Http\Livewire\FireExtinguisher;

use Livewire\Component;
use App\Models\FireList;
use App\Models\FireListHistory;
use App\Models\LocationList;

class FireForm extends Component
{
    public $fireId, $type, $firename, $serial_number, $building, $floor, $room, $installation_date, $expiration_date, $description,$finding, $status;
    public $action = '';  //flash
    public $message = '';  //flashSSS
    public $fireCheck = [];
    public $selectedFire = [];
    public $viewMode = false;

    protected $listeners = [
        'fireId',
        'resetInputFields',
        'openViewModal'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function openViewModal($fireId)
    {
        
        $fire = FireList::findOrFail($fireId);
        $this->fireId = $fireId;
        $this->type = $fire->type;
        $this->firename = $fire->firename;
        $this->serial_number = $fire->serial_number;
        $this->building = $fire->building;
        $this->floor = $fire->floor;
        $this->room = $fire->room;
        $this->installation_date = $fire->installation_date;
        $this->expiration_date = $fire->expiration_date;
        $this->description = $fire->description;
        $this->finding = $fire->finding;
        $this->status = $fire->status;

        $this->viewMode = true; // Set $viewMode to true when opening the view modal
        $this->emit('openViewModal');
    }
    public function fireId($fireId)
    {
        $this->resetInputFields();
        $this->fireId = $fireId;
        $fire = FireList::find($fireId);
        $this->type = $fire->type;
        $this->firename = $fire->firename;
        $this->serial_number = $fire->serial_number;
        $this->building = $fire->building;
        $this->floor = $fire->floor;
        $this->room = $fire->room;
        $this->installation_date = $fire->installation_date;
        $this->expiration_date = $fire->expiration_date;
        $this->description = $fire->description;
        $this->finding = $fire->finding;
        $this->status = $fire->status;

        $this->selectedFire = $fire->getFireNames()->toArray();
        $this->viewMode = false;
    }

    public function store()
    {
        if (is_object($this->selectedFire)) {
            $this->selectedFire = json_decode(json_encode($this->selectedFire), true);
        }

        if (empty($this->fireCheck)) {
            $this->fireCheck = array_map('strval', $this->selectedFire);
        }

        if ($this->fireId) {
            $data = $this->validate([
                'type' => 'required',
                'firename' => 'required',
                'serial_number' => 'required',
                'building' => 'required',
                'floor' => 'nullable',
                'room' => 'required',
                'installation_date' => 'required',
                'expiration_date' => 'required',
                'description' => 'nullable',
                'finding'         => 'nullable',
                'status' => 'nullable',
            ]);

            $fire = FireList::find($this->fireId);
            if ($fire) {
                // Save old data to history table
                FireListHistory::create([
                    'fire_list_id' => $fire->id,
                    'type' => $fire->type,
                    'firename' => $fire->firename,
                    'serial_number' => $fire->serial_number,
                    'building' => $fire->building,
                    'floor' => $fire->floor,
                    'room' => $fire->room,
                    'installation_date' => $fire->installation_date,
                    'expiration_date' => $fire->expiration_date,
                    'description' => $fire->description,
                    'finding' => $fire->finding,
                    'status' => $fire->status,
                ]);
    
            $fire->update($data);
            if (!empty($this->selectedFire)) {
                $fire->syncFire($this->selectedFire);
            }

            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $this->validate([
                'type' => 'required',
                'firename' => 'required',
                'serial_number' => 'required|unique:fire_lists|digits:7',
                'building' => 'required',
                'floor' => 'nullable',
                'room' => 'required',
                'installation_date' => 'required',
                'expiration_date' => 'required',
                'description' => 'nullable',
                'finding'     => 'nullable',
                'status' => 'nullable',
            ]);

            $fire = FireList::create([
                'type' => $this->type,
                'firename' => $this->firename,
                'serial_number' => $this->serial_number,
                'building' => $this->building,
                'floor' => $this->floor,
                'room' => $this->room,
                'installation_date' => $this->installation_date,
                'expiration_date' => $this->expiration_date,
                'description' => $this->description,
                'finding'      => $this->finding,
                'status' => $this->status,
            ]);

            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeFireModal');
        $this->emit('refreshParentFireExtinguisher');
        $this->emit('refreshTable');
    }

    }
    public function render()
    {
        $fire = FireList::all();
        $locations = LocationList::all();

        return view('livewire.fire-extinguisher.fire-form', [
            'fire' => $fire,
            'locations' => $locations,


        ]);
    }
}

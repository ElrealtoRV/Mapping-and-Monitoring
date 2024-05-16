<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestLists;

use App\Models\LocationList;
use App\Models\Request;
use App\Models\FindingList;

class RequestForm extends Component
{
    public $requestId,$user_id, $type, $firename, $room,$building,$floor,$request,$created_at;
    public $action = '';  //flash
    public $message = '';  //flashSSS
    public $requestCheck = array();
    public $selectedRequest = [];

    protected $listeners = [
        'requestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function requestId($requestId)
    {
        $this->requestId = $requestId;
        $request = RequestLists::find($requestId);
        $this->user_id = $request->user_id;
        $this->type = $request->type;
        $this->firename = $request->firename;
        $this->room = $request->room;
        $this->building = $request->building;
        $this->floor = $request->floor;
        $this->request = $request->request;
        $this->created_at = $request->created_at;

        $this->selectedRequest = $request->getRequestNames()->toArray();
    }

    public function store()
    {
          if (is_object($this->selectedRequest)) {
            $this->selectedRequest = json_decode(json_encode($this->selectedRequest), true);
        }

        if (empty($this->requestCheck)) {
            $this->requestCheck = array_map('strval', $this->selectedRequest);
        }

        if ($this->requestId) {

            $data = $this->validate([
                'type'    => 'nullable',
                'firename'   => 'nullable',
                'room'     => 'required',
                'building' => 'nullable',
                'floor' => 'nullable',
                'request'     => 'required',
                
            ]);
            if (!isset($data['type'])) {
                $data['type'] = null;
            }

            $request = RequestLists::find($this->requestId);
            $request->update($data);


            $request->syncRequest($this->requestCheck);

            $action = 'edit';
            $message = 'Successfully Updated';
        } else {

            $this->validate([
                'type'    => 'nullable',
                'firename'   => 'nullable',
                'room'     => 'required',
                'building' => 'nullable',
                'floor' => 'nullable',
                'request'     => 'required',
               
            ]);

            $request = RequestLists::create([
                'user_id' => auth()->id(),
                'type'    => $this->type,
                'firename'   => $this->firename,
                'room'      => $this->room,
                'building'      => $this->building,
                'floor'      => $this->floor,
                'request'      => $this->request,
                
            ]);

            $action = 'store';
            $message = 'Successfully Created';
        }
        
        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRequestModal');
        $this->emit('refreshParentRequest   ');
        $this->emit('refreshTable');

    }
    public function approveRequest($requestId)
    {
        // Find the request by ID
        $request = RequestLists::findOrFail($requestId);
        
        // Update status to 'Approved'
        $request->status = 'Approved';
        $request->save();

        // Further logic for approval...
    }
    public function cancelRequest($requestId)
    {
        $request = RequestLists::findOrFail($requestId);
        $request->status = 'Cancelled';
        $request->save();

        $action = 'cancel';
        $message = 'Cancel Successfully ';

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRequestModal');
        $this->emit('refreshParentRequest   ');
        $this->emit('refreshTable');
    }

    public function deleteRequest($requestId)
    {
        RequestLists::findOrFail($requestId)->delete();

        $action = 'Delete';
        $message = 'Deleted Successfully ';

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRequestModal');
        $this->emit('refreshParentRequest   ');
        $this->emit('refreshTable');
    }
    public function render()
    {
        $requests =RequestLists::all();
        $locations =LocationList::all();
        $addrequests =Request::all();

        return view('livewire.request.request-form', [
            'requests' => $requests,
            'locations' => $locations,
            'addrequests' => $addrequests,
         

        ]);
    }
}

<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use App\Models\RequestLists;
use App\Models\Request;
use App\Models\TypeList;
use App\Models\User;
use App\Models\ApproveList;




class RequestList extends Component
{
    public $requestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshRequest' => '$refresh',
        'deleteRequest',
        'editRequest',
        'deleteConfirmRequest'
        
    ];
    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function createRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openRequestModal');
    }
    public function editRequest($requestId)
    {
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openRequestModal');
        
    }
    public function deleteFire($requestId)
    {
        RequestLists::destroy($requestId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }
    public function approveRequest($requestId)
    {
        // Find the request by ID
        $request = RequestLists::findOrFail($requestId);
    
        // Check if the request is already approved
        if ($request->status === 'Approved') {
            session()->flash('warning', 'This request has already been approved.');
            return;
        }
    
        // Update the status of the request to "Approved"
        $request->update(['status' => 'Approved']);
    
        // Optionally, create a new record in the ApproveList table
        // and populate it with information from the request
        // ApproveList::create([
        //     'request_id' => $request->id,
        //     'first_name' => $request->regularUser->first_name,
        //     'last_name' => $request->regularUser->last_name,  
        //     'idnum' => $request->regularUser->idnum,         
        //     'affiliation' => $request->regularUser->affiliation, 
        // ]);
    
        // Emit an event to notify the user
        $this->emit('approveRequestSuccess', 'Request approved successfully.');
    }
    
    

    
    
    public $showRequestList = true;

    public function showRequestList()
    {
        $this->showRequestList = true;
    }

    public function showApproveList()
    {
        $this->showRequestList = false;
    }
   public function render()
{
    
    $requests = RequestLists::with('fireex', 'user')->get();
    $types = TypeList::all();
    $locations = RequestLists::with('fireLocation')->get();
    $addrequests = RequestLists::with('AddRequest')->get();
    $regularusers = User::all();

    if ($this->showRequestList) {
        $requests = RequestLists::with(['fireex', 'AddRequest'])->get();
    } else {
        $approvedRequests = ApproveList::with('user')->get();
    }
    // Convert integer data to strings
    $requests->transform(function ($request) {
        $request->type = $request->type ? TypeList::find($request->type)->name : null;
        // Convert other integer fields in a similar manner if needed
        return $request;
    });

    if (!empty($this->search)) {
        $requests->where(function ($query) {
            $query->where('type', 'LIKE', '%' . $this->search . '%')
                ->orWhere('firename', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('serialNum', function ($locationQuery) {
                    $locationQuery->where('description', 'LIKE', '%' . $this->search . '%');
                });
        });
    }

    return view('livewire.request.request-list', [
        'requests' => $requests ?? [],
        'approvedRequests' => $approvedRequests ?? [],
        'types' => $types,
        'locations' => $locations,
        'addrequests' => $addrequests,
        'regularusers' => $regularusers
    ]);
}

}
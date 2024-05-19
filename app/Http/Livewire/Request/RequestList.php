<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use App\Models\RequestLists;
use App\Models\Request;
use App\Models\User;
use App\Models\ApproveList;
use Illuminate\Support\Facades\Auth;




class RequestList extends Component
{
    public $requestId;
    public $typeFilter = '';
    public $buildingFilter = '';
    public $roomFilter = '';
    public $selectedCollege = '';
    public $selectedStatus = '';
    public $college;
    public $statuses;
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

    public function updatingTypeFilter()
    {
        $this->emit('refreshTable');
    }
    public function updatingBuildingFilter()
    {
        $this->emit('refreshTable');
    }

    
    public function createRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openRequestModal');
    }
    public function mount()
    {
        $this->colleges = User::distinct()->pluck('college')->toArray();
        $this->statuses = ['Pending', 'Approved'];
        $this->filterRequestList(); // Call the filterRequestList method to apply initial filters
    }
    public function updatedSelectedCollege()
    {
        $this->filterRequestList();
    }
    public function updatedSelectedStatus()
    {
        $this->filterRequestList();
    }
    public function filterRequestList()
    {
        $query = RequestLists::query();
    
        if ($this->selectedCollege) {
            $query->where('college', $this->selectedCollege);
        }
        if (!empty($this->selectedStatus)) {
            $query->where('status', $this->selectedStatus);
        }
    
        $this->addRequests = $query->get();
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

    // Check if the current user is authorized to approve requests
    $user = Auth::user();
    if (!$user) {
        session()->flash('error', 'Authentication error: User not found.');
        return;
    }

    // Update the status of the request to "Approved"
    $request->update(['status' => 'Approved']);

    // Create a new record in the ApproveList table
    ApproveList::create([
        'request_id' => $request->id,
        'user_id' => $user->id,
    ]);

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
        $requestsQuery = RequestLists::with('user');
    
        if (!empty($this->search)) {
            $requestsQuery->where(function ($query) {
                $query->where('type', 'LIKE', '%' . $this->search . '%')
                      ->orWhere('firename', 'LIKE', '%' . $this->search . '%')
                      ->orWhere('request', 'LIKE', '%' . $this->search . '%')
                      ->orWhere('college', 'LIKE', '%' . $this->search . '%')
                      ->orWhere('transaction_id', 'LIKE', '%' . $this->search . '%')
                      ->orWhere('serialNum', 'LIKE', '%' . $this->search . '%');
            });
        }
    
        if (!empty($this->buildingFilter)) {
            $requestsQuery->where('building', $this->buildingFilter);
        }
    
        $requests = $requestsQuery->get();
        $locations = RequestLists::with('fireLocation')->get();
        $addrequests = RequestLists::with('AddRequest')->get();
        $regularusers = User::all();
    
        if ($this->showRequestList) {
            $requests = $requestsQuery->with('AddRequest')->get();
        } else {
            $approvedRequests = ApproveList::with('user')->get();
        }
    
        return view('livewire.request.request-list', [
            'requests' => $requests ?? [],
            'approvedRequests' => $approvedRequests ?? [],
            'locations' => $locations,
            'addrequests' => $addrequests,
            'regularusers' => $regularusers,
            'addRequests' => $this->addRequests,
        ]);
    }
    public function resetFilters()
    {
        $this->reset(['selectedCollege', 'selectedStatus', 'search']);
        $this->loadData(); // Reload data after resetting filters
    }
    
}
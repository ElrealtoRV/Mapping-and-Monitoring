<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestLists;
use App\Models\Request;
use App\Models\TypeList;
use App\Models\User;
use App\Models\ApproveList;




class UserRequest extends Component
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
    public function cancelRequest($requestId)
    {
        RequestLists::destroy($requestId);

        $action = 'error';
        $message = 'Cancel Successfully';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
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
        $user = Auth::user();
        $requests = $user->requests()->with(['AddRequest', 'fireex'])->get();
        $types = TypeList::all();
    
        // Remove this block as it retrieves all requests, not just the user's requests
        // $addrequests = RequestLists::with('AddRequest')->get();
    
        // Convert integer data to strings
        $requests->transform(function ($request) {
            $request->type = $request->type ? TypeList::find($request->type)->name : null;
            // Convert other integer fields in a similar manner if needed
            return $request;
        });
    
        if (!empty($this->search)) {
            $requests->where(function ($query) {
                $query->where('type', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('Status', 'LIKE', '%' . $this->search . '%')
                    ->orWhereHas('serialNum', function ($locationQuery) {
                        $locationQuery->where('description', 'LIKE', '%' . $this->search . '%');
                    });
            });
        }
    
        return view('livewire.request.user-request', [
            'requests' => $requests,
            'types' => $types,
            // Remove 'addrequests' from the returned data as it's not needed
            'user' => $user
        ]);
    }
    

}
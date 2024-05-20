<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestLists;
use App\Models\Request;
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
        $requests = $user->requests()->with(['AddRequest'])->get();
    
        // Retrieve the approver's information for each request
        $requests->map(function ($request) {
            $approveRecord = ApproveList::where('request_id', $request->id)->first();
            if ($approveRecord) {
                $approver = $approveRecord->user->first_name . ' ' . $approveRecord->user->last_name;
                $approvedAt = $approveRecord->created_at->setTimezone('Asia/Manila')->format('M d, Y h:i A'); // Format with Philippines time and MDY format
                $request->approver = $approver;
                $request->approved_at = $approvedAt;
            } else {
                $request->approver = 'Waiting For Approval';
                $request->approved_at = null; // Or any default value you prefer
            }
            return $request;
        });
    
        if (!empty($this->search)) {
            $requests = $requests->filter(function ($request) {
                return stripos($request->type, $this->search) !== false
                    || stripos($request->firename, $this->search) !== false
                    || stripos($request->request, $this->search) !== false;
            });
        }
    
        return view('livewire.request.user-request', [
            'requests' => $requests,
            'user' => $user
        ]);
    }

}
<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\ApproveList;
use App\Models\RequestLists;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RequestReport extends Component
{
    public $requestId;
    public $approveList;
    public $selectedCollege = '';
    public $selectedRequest = '';
    public $selectedStatus = '';
    public $college;
    public $statuses;
  
    public $addRequests;

    public function mount()
{
    $this->statuses = ['Approved']; // Only show approved requests
    $this->filterRequestList(); // Call the filterRequestList method to apply initial filters
    
    // Fetch distinct colleges from the User model
    $this->colleges = User::distinct()->pluck('college')->toArray();
    
    // Map over each request to fetch and attach approval information
    $this->addRequests->map(function ($request) {
        // Fetch the approval record for the current request
        $approveRecord = ApproveList::where('request_id', $request->id)->first();
        
        if ($approveRecord) {
            // If approval record exists, attach approver information
            $approver = $approveRecord->user->first_name . ' ' . $approveRecord->user->last_name;
            $approvedAt = $approveRecord->created_at->format('Y-m-d H:i:s'); // Assuming 'created_at' stores the approval time
            $request->approver = $approver;
            $request->approved_at = $approvedAt;
        } else {
            // If no approval record exists, set default values
            $request->approver = 'Waiting For Approval';
            $request->approved_at = null; // Or any default value you prefer
        }

        return $request;
    });
}





public function filterRequestList()
{
    // Retrieve only approved requests
    $query = RequestLists::whereHas('approves', function ($query) {
        $query->where('status', 'Approved');
    });

    // Filter by selected college if it's not empty
    if (!empty($this->selectedCollege)) {
        $query->whereHas('user', function ($query) {
            $query->where('college', $this->selectedCollege);
        });
    }

    $this->addRequests = $query->get();
}

public function updatedSelectedCollege()
{
    $this->filterRequestList();
}

  public function render()
    {
        
       
        // Pass the retrieved data to the view
        return view('livewire.report.request-report', [
            'addRequests' => $this->addRequests,
            'colleges' => $this->colleges, // Pass $colleges variable to the view
        ]);
    }
}

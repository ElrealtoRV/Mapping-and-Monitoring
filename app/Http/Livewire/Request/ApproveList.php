<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use App\Models\ApproveList as ApproveLists;

class ApproveList extends Component
{
    public $approveRequests;

    public function mount()
    {
        $this->approveRequests = ApproveLists::with(['request.user'])->get();
    }
    public function AddTask($approveListId)
    {
        $this->emit('taskForm:openTaskModal', $approveListId); // Emit the unique event name
    }
    public function render()
    {
        return view('livewire.request.approve-list', ['approveRequests' => $this->approveRequests]);
}
}
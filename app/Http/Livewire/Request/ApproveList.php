<?php

namespace App\Http\Livewire\Request;

use Livewire\Component;
use App\Models\ApproveList as ApproveLists;
use App\Models\Task;

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
    public function completeTask($taskId)
    {
        $task = Task::findOrFail($taskId);
    
        // Check if the task is already marked as complete
        if ($task->status === 'Complete') {
            session()->flash('warning', 'This task has already been completed.');
            return;
        }
    
        // Check if the task is marked as missed
        if ($task->status === 'Missed') {
            session()->flash('warning', 'This task is marked as missed and cannot be completed.');
            return;
        }
    
        // Check if the authenticated user is the assigned user for the task
        if (auth()->id() != $task->user_id) {
            session()->flash('error', 'You are not authorized to complete this task.');
            return;
        }
    
        $task->status = 'Complete';
        // You might want to record who completed the task, assuming you have authentication
        $task->doneBy = auth()->id();
        $task->save();
    
        session()->flash('success', 'Task completed successfully!');
    }
    public function render()
    {
        return view('livewire.request.approve-list', ['approveRequests' => $this->approveRequests]);
}
}
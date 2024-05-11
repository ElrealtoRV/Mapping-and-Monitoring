<?php
// app/Http/Livewire/TaskManager.php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{

    public $taskId;
    public $search ='';

    public $tasks;
    public $errorMessage;
    public $successMessage;

    protected $listeners = [
        'refreshParentTaskManager' => '$refresh',
        'deleteTask',
        'editTask',
        'deleteConfirmTask'
    ];
    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function mount()
    {
        $this->tasks = Task::with('user')->get();
    }


    public function AddTask()
    {
        $this->emit('resetInputFields');
        $this->emit('openTaskModal');
    }
    public function editTask($taskId)
    {
        $task = Task::findOrFail($taskId);
    
        if ($task->status === 'Complete') {
            session()->flash('error', 'You cannot edit a task that is already complete.');
            return;
        }
    
        $this->taskId = $taskId;
        $this->emit('taskId', $this->taskId);
        $this->emit('openTaskModal');
    }
    public function completeTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->status = 'Complete';
        
        
        // Fetch the user who completed the task
        $user = auth()->user();
        
        // Assuming you have first_name and last_name attributes in your User model
        $task->doneBy = $user->first_name . ' ' . $user->last_name;
        
        $task->save();
        $this->flash('success', 'Task completed successfully!');
        
        // Fetch the updated task with the user who completed it
        $updatedTask = Task::with('user')->findOrFail($taskId);
        
        // Emit an event or update Livewire property with the updated task if necessary
    }
     
    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->delete();
            $action = 'error';
            $message = 'Successfully Deleted';
        } else {
            $this->errorMessage = 'Task not found.';
        }
        
        $this->tasks = Task::with('user')->get(); // Refresh tasks

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('task_name', 'like', '%' . $this->search . '%')
                    ->orWhere('due_date', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($userQuery) {
                        $userQuery->where('first_name', 'like', '%' . $this->search . '%')
                            ->orWhere('last_name', 'like', '%' . $this->search . '%')
                            ->orWhere('role', 'like', '%' . $this->search . '%');
                    });
                    
            })
            ->get();
    
        return view('livewire.task.task-manager', ['tasks' => $tasks]);
    }
    
}


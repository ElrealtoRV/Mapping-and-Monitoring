<?php
// app/Http/Livewire/TaskManager.php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    public $taskId;
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
        $this->taskId = $taskId;
        $this->emit('taskId', $this->taskId);
        $this->emit('openTaskModal');
        
    }
    public function completeTask($taskId)
        {
            $task = Task::findOrFail($taskId);
            $task->status = 'Complete';
            // You might want to record who completed the task, assuming you have authentication
            $task->doneBy = auth()->id();
            $task->save();
            $this->flash('success', 'Task completed successfully!');
        }
    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);

        if ($task) {
            $task->delete();
            $this->successMessage = 'Task deleted successfully.';
        } else {
            $this->errorMessage = 'Task not found.';
        }
        
        $this->tasks = Task::with('user')->get(); // Refresh tasks
    }

    public function render()
    {
        return view('livewire.task.task-manager');
    }
}


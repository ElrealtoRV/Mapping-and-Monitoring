<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;

class TaskForm extends Component
{
    public $taskId;
    public $task_name;
    public $due_date;
    public $user_id;
    public $status;
    public $users;

    protected $listeners = [
        'taskId',
        'resetInputFields'
    ];

    protected $rules = [
        'task_name' => 'required|string',
        'due_date' => 'required|date',
        'user_id' => 'required|exists:users,id',
        
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }



    public function store()
    {
        $this->validate();

        $data = [
            'task_name' => $this->task_name,
            'due_date' => $this->due_date,
            'user_id' => $this->user_id,
            'status' => $this->getStatus(),

        ];

        if ($this->taskId) {
            Task::whereId($this->taskId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Task::create($data);
            $action = 'store';
            $message = 'Posted a Task Successfully';
        }

        $this->emit('flashAction', $action, $message);

        $this->resetInputFields();
        $this->emit('closeTaskModal');
        $this->emit('refreshParentTaskManager');
        $this->emit('refreshTable');
    }
    public function editTask($taskId)
    {
        $task = Task::findOrFail($taskId);

        $this->taskId = $task->id;
        $this->task_name = $task->task_name;
        $this->due_date = $task->due_date;
        $this->user_id = $task->user_id;
        $this->status = $task->status;

        // Dispatch an event to open the modal
        $this->emit('openTaskModal');
    }
    private function getStatus()
    {
        return ($this->due_date < now()) ? 'Missed' : 'Incomplete';
    }


    public function render()
    {


    return view('livewire.task.task-form');

    }
}
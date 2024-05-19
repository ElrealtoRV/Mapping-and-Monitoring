<?php

namespace App\Http\Livewire\Request;

use App\Models\Task;
use App\Models\User;
use App\Models\ApproveList;
use Livewire\Component;

class TaskForm extends Component
{
    public $taskId;
    public $task_name;
    public $due_date;
    public $user_id;
    public $status;
    public $users;
    public $approveListId;
    
    public $taskCheck = array();
    public $selectedTask= [];

    protected $listeners = [
        'taskId',
        'resetInputFields',
        'taskForm:openTaskModal' => 'openTaskModal', // Specify the method to call when receiving the event
    ];

    // protected $rules = [
    //     'task_name' => 'required|string',
    //     'due_date' => 'required|date',
    //     'user_id' => 'required|exists:users,id',
        
    // ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function taskId($taskId)
    {
        $this->taskId = $taskId;
        $task = Task::find($taskId);
        $this->task_name= $task->task_name;
        $this->user_id = $task->user_id;
        $this->due_date = $task->due_date;


        $this->selectedTask = $task->getTaskNames()->toArray();
    }
    public function openTaskModal($approveListId)
    {
        $this->approveListId = $approveListId;
        $this->resetInputFields();
        $this->emit('taskForm:openTaskModal', $approveListId); // Unique event name
    }

    public function store()
    {
        if (is_object($this->selectedTask)) {
            $this->selectedTask = json_decode(json_encode($this->selectedTask), true);
        }

        if (empty($this->taskCheck)) {
            $this->taskCheck = array_map('strval', $this->selectedTask);
        }

        $data = $this->validate([
            'task_name' => 'required|string',
            'due_date' => 'required|date|after_or_equal:' . now()->format('Y-m-d'),
            'user_id' => 'required|exists:users,id',
        ], [
            'task_name.required' => 'Task field is required.',
            'due_date.required' => 'Due date is required.',
            'user_id.required' => 'Assigned personnel is required.',
            'due_date.after_or_equal' => 'The due date must be a future date.',
            'user_id.exists' => 'Assigned personnel must be a valid user.',
        ]);

        if ($this->taskId) {
            $task = Task::find($this->taskId);
            $task->update($data);
            $task->syncTask($this->taskCheck);

            $approveRequest = ApproveList::find($task->approve_list_id);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $task = Task::create([
                'task_name' => $this->task_name,
                'user_id' => $this->user_id,
                'due_date' => $this->due_date,
            ]);

            $approveRequest = ApproveList::find($this->approveListId);
            $action = 'store';
            $message = 'Successfully Created';
        }

        // Update status to "Posted"
        if ($approveRequest) {
            $approveRequest->status = 'Posted';
            $approveRequest->save();
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
        if ($this->due_date <= now()->endOfDay()) {
            return 'Incomplete';
        } else {
            return 'Complete';
        }
    }


    public function render()
    {


    return view('livewire.request.task-form');

    }
}
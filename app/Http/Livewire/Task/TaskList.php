<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\DoneTask;
use Illuminate\Support\Facades\Auth;


class TaskList extends Component
{

    public function completeTask($taskId)
{
    $task = Task::findOrFail($taskId);

    // Check if the task is already marked as complete
    if ($task->status === 'Complete') {
        session()->flash('warning', 'This task has already been completed.');
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
        $tasks = Task::all();
        return view('livewire.task.task-list', ['tasks' => $tasks]);
    }
}

<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use Illuminate\Support\Facades\PDF;
use App\Models\Task;
use App\Models\User;

class TaskReport extends Component
{
    public $tasks;
    public $personnels;
    public $statuses;
    public $selectedPersonnel = '';
    public $selectedStatus = '';
    public $search = '';

    public function mount()
    {
        $this->loadData();
    }
    
    public function loadData()
    {
        $this->personnels = User::whereNotIn('role', ['admin', 'head', 'dean'])->get();
        $this->statuses = Task::pluck('status')->unique()->toArray();
        $this->tasks = Task::all(); // You might want to filter this based on $selectedPersonnel and $selectedStatus
    }
    public function render()
    {
        $tasksQuery = Task::query();

        if (!empty($this->selectedPersonnel)) {
            $tasksQuery->where('user_id', $this->selectedPersonnel);
        }

        if (!empty($this->selectedStatus)) {
            $tasksQuery->where('status', $this->selectedStatus);
        }

        if (!empty($this->search)) {
            $tasksQuery->where('task_name', 'like', '%' . $this->search . '%');
        }

        $this->tasks = $tasksQuery->get();

        return view('livewire.report.task-report');
    }

    public function resetFilters()
    {
        $this->reset(['selectedPersonnel', 'selectedStatus', 'search']);
        $this->loadData(); // Reload data after resetting filters
    }
}

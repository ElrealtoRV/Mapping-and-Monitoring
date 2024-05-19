<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use App\Models\FireList;
use App\Models\ExpiredFire;
use App\Models\User;
use App\Models\ExpiredList;
use App\Models\Task;
use App\Models\RequestLists;

class Analytical extends Component
{
    public $fires;
    public $selectedReport = 'analytical';
    public $userCounts;
    public $regularusers;

    public function showReport($report)
    {
        $this->selectedReport = $report;
    }
    public function mount()
    {
        $this->fires = FireList::count();
        $this->expiredFireCount = FireList::where('status', 'Expired')->count(); // Count expired fire extinguishers
        $this->userCounts = User::count();
        $this->taskCounts = Task::count();
        $this->requestCounts = RequestLists::count();
    }

    public function render()
    {
        $tasks = Task::count();
        $requests = RequestLists::count();
        return view('livewire.report.analytical', [
            'fires' => $this->fires,
            'expiredFireCount' => $this->expiredFireCount,
            'userCounts' => $this->userCounts,
            'tasks' => $this->taskCounts,
            'requests' => $this->requestCounts,
        ]);
    }
}

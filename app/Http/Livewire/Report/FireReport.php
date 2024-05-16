<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\FireList;

class FireReport extends Component
{
    public $selectedReport = 'fire-report';
    public $selectedDepartment = '';
    public $selectedType = '';
    public $selectedStatus = '';
    public $departments;
    public $types;
    public $statuses;
    public $fire;

    public function mount()
    {
        $this->departments = FireList::distinct()->pluck('building')->toArray();
        $this->types = FireList::distinct()->pluck('type')->toArray();
        $this->statuses = ['Active', 'Expired'];
        $this->filterFireList();
    }

    public function isExpirationDateCloseToWarning($expirationDate)
    {
        $expirationDate = Carbon::parse($expirationDate);
        $warningDate = $expirationDate->subYears(2);
        return Carbon::now()->gte($warningDate);
    }
    public function updatedSelectedDepartment()
    {
        $this->filterFireList();
    }

    public function updatedSelectedType()
    {
        $this->filterFireList();
    }
    public function updatedSelectedStatus()
    {
        $this->filterFireList();
    }
    public function filterFireList()
    {
        $query = FireList::query();

        if ($this->selectedDepartment) {
            $query->where('building', $this->selectedDepartment);
        }

        if ($this->selectedType) {
            $query->where('type', $this->selectedType);
        }
        if ($this->selectedStatus) {
            if ($this->selectedStatus == 'Expired') {
                $query->whereDate('expiration_date', '<', now());
            } else {
                $query->whereDate('expiration_date', '>=', now());
            }
        }

        $this->fire = $query->get()->map(function($fire) {
            if (now()->greaterThan($fire->expiration_date)) {
                $fire->status = 'Expired';
            }
            return $fire;
        });
    }
    public function render()
    {
       
        return view('livewire.report.fire-report', [
            'fire' => $this->fire,
            'departments' => $this->departments,
            'types' => $this->types,
            'statuses' => $this->statuses,
        ]);
    }
}
